<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Api\BaseController as BaseController;
use App\Models\TableCategory;
use App\Models\TableNotification;
use App\Models\TableProductDetail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;
use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Support\Str;
use Carbon\Carbon;
use App\Mail\SendMail;
use App\Jobs\SendMailJob;
use App\Events\PusherEvent;
use App\Models\TableOrder;
use App\Models\TableOrderDetail;
use App\Models\TableProduct;
use App\Models\TablePromotion;

class CartController extends BaseController
{
    public $temp_code;

//    public function __construct(){
//        $this->temp_code = '';
//    }
    public function index()
    {
        $data = Cart::content();
        return View('template.order.order',compact('data'));
    }


    public function add(Request $request)
    {
        $product_id = (int)$request->get('pronb_id');
        $color = $request->get('pronb_color');
        $size = $request->get('pronb_size');
        $productById =  TableProduct::find($product_id);

        if($productById->regular_price == null && $productById->discount == null && $productById->sale_price == null)
        {
            $price = 0;
        }

        if($productById->discount != null){
            $price = $productById->sale_price;
        }else{
            $price = $productById->regular_price;
        }

        $data = Cart::add([
            'id' => $product_id,
            'name' => $productById->name,
            'qty' => 1,
            'price' => $price,
            'options' => [
                'size' => $size,
                'color' => $color,
                'discount' => $productById->discount,
                'sale_price' => $productById->sale_price,
                'regular_price' => $productById->regular_price,
                'photo' => $productById->photo,
                'code' => $productById->code,
                'slug' => $productById->slug,
            ],
        ]);

        return redirect('/cart')->with('alert','Bạn đã thêm sản phẩm vào giỏ hàng thành công!');
    }

    public function update(Request $request){
        $dataOrder = $request->input('qty');

        foreach ($dataOrder as $rowId => $qty) {
            Cart::update($rowId,$qty); // Cart::update($rowId, 2); // Will update the quantity
        }
        return redirect('/cart')->with('alert','Bạn đã cập nhật sản phẩm vào giỏ hàng thành công!');
    }

    public function destroy(){
        Cart::destroy();
        return redirect('/cart')->with('alert','Bạn đã xóa giỏ hàng thành công!');

    }

    public function remove($rowId){
        Cart::remove($rowId);
        return redirect('/cart')->with('alert','Bạn đã xóa sản phẩm thành công!');

    }

    // Nâng cấp
    public function update_ajax(Request $request){
        $id = $request->get('id');
        $qty = $request->get('qty');
        $price = $request->get('price');
        $rowId = $request->get('rowId');

        $subTotal = $qty * $price;

        Cart::update($rowId, $qty);

        $result = [
            "subTotal" => number_format($subTotal, 0, ",", ".")."vnđ",
            "total" => number_format(Cart::total(), 0, ",", ".")."vnđ",
        ];

        echo json_encode($result);
    }

    public function checkout(){
        return view('template.order.checkout');
    }

    public function execPostRequest($url, $data)
    {
        $ch = curl_init($url);
        curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST");
        curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_HTTPHEADER, array(
                'Content-Type: application/json',
                'Content-Length: ' . strlen($data))
        );
        curl_setopt($ch, CURLOPT_TIMEOUT, 5);
        curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 5);
        //execute post
        $result = curl_exec($ch);
        //close connection
        curl_close($ch);
        return $result;
    }

    public function momo_payment(Request $request,DB $db)
    {
        $endpoint = "https://test-payment.momo.vn/v2/gateway/api/create";
        $partnerCode = 'MOMOBKUN20180529';
        $accessKey = 'klm05TvNBzhg7h7j';
        $secretKey = 'at67qH6mk8w5Y1nAyMoYKMWACiEi2bsa';
        $orderInfo = "Thanh toán qua ATM MoMo";

        $amount = (int)$request->get('product_total');

        $orderId = time() ."";
        $redirectUrl = "http://127.0.0.1:8000"; // đường dẫn trả về khi thanh toán thành công
        $ipnUrl = "http://127.0.0.1:8000";
        $extraData = "";
        $requestId = time() . "";
        $requestType = "payWithATM";

        //before sign HMAC SHA256 signature
        $rawHash = "accessKey=" . $accessKey . "&amount=" . $amount . "&extraData=" . $extraData . "&ipnUrl=" . $ipnUrl . "&orderId=" . $orderId . "&orderInfo=" . $orderInfo . "&partnerCode=" . $partnerCode . "&redirectUrl=" . $redirectUrl . "&requestId=" . $requestId . "&requestType=" . $requestType;
        $signature = hash_hmac("sha256", $rawHash, $secretKey);
        $data = array('partnerCode' => $partnerCode,
            'partnerName' => "Test",
            "storeId" => "MomoTestStore",
            'requestId' => $requestId,
            'amount' => $amount,
            'orderId' => $orderId,
            'orderInfo' => $orderInfo,
            'redirectUrl' => $redirectUrl,
            'ipnUrl' => $ipnUrl,
            'lang' => 'vi',
            'extraData' => $extraData,
            'requestType' => $requestType,
            'signature' => $signature);
        $result = $this->execPostRequest($endpoint, json_encode($data));
        $jsonResult = json_decode($result, true);  // decode json

        // Lưu vào database
        $this->store($request,$db);
        return redirect()->to($jsonResult['payUrl']);
    }


    public function cod_payment(Request $request, DB $db)
    {
        // Lưu vào database
        $this->store($request,$db);
        return redirect()->route('index')->with('CartToast',' Bạn đã thanh toán thành công');
    }

    public function store(Request $request, DB $db)
    {
        // Kiểm tra dữ liệu người dùng nhập
         $this->validate_cart($request);

        // Dữ liệu giỏ hàng
        $dataCart= Cart::content();

        // Dữ liệu người dùng
        $dataUser = [
            'user_id' => Auth::user()->id,
            'fullname' => $request->get('fullname'),
            'email' => $request->get('email'),
            'phone' => $request->get('phone'),
            'address' => $request->get('address'),
            'city' => $request->get('city'),
            'district' => $request->get('district'),
            'ward' => $request->get('ward'),
            'payment_method' => $request->get('payment_method'),
        ];

        $user_id = Auth::user()->id;
        $code_order = 'UNI'.Str::random(5);
        $promo_code = $request->get('promo_code');


        $db::transaction(function () use ($request,$user_id,$dataUser,$dataCart,$code_order) {
            // Lưu vào table_order
            $order = TableOrder::create([
                'code' => $code_order,
                'user_id' => $user_id,
                'shipping_fullname' => $dataUser['fullname'],
                'shipping_phone' => $dataUser['phone'],
                'shipping_address' => $dataUser['address'],
                'temp_price' => (int)Cart::total(),
                'total_price' => (int)$request->get('product_total'),
                'payment_method' => $dataUser['payment_method'],
                'status_id' => 1,
            ]);
            // Lưu vào table_order_details
            foreach ($dataCart as $kcart => $vcart) {
                $order_details =  TableOrderDetail::create([
                    'order_id' => $order->id,
                    'product_id' => $vcart->id,
                    'color' => $vcart->options->color,
                    'size' => $vcart->options->size,
                    'quantity' => $vcart->qty,
                ]);
                // Giảm SLTK khi đặt hàng thành công
                $product_id =$vcart->id;
                $color =$order_details->color;
                $qty = $order_details->quantity;

                $product_detail = TableProductDetail::where('product_id',$product_id)
                    ->where('color',$color)
                    ->first();
                $product_detail->stock -=$qty;
                $product_detail->save();
            }

            // Lưu vào table_notifications
            $message_notification ="Đơn hàng của ".$dataUser['fullname'];
            $this->store_notification($request,$user_id,$order->id, $message_notification);
        });

        // Gửi Mail cho khách hàng
        $dataMail = [
            "code_order" => $code_order,
            "fullname" => $dataUser['fullname'],
            "address" => $dataUser['address'],
            "email" => $dataUser['email'],
            "phone" => $dataUser['phone'],
            "payment_method" => $dataUser['payment_method'],
            "total" =>(int)$request->get('product_total'),
            "time_now" => Carbon::now()->format('d/m/Y m:h:s'),
            'dataCart' => Cart::content(),
        ];

        // thêm vào hàng đợi gửi mail
        dispatch(new SendMailJob($dataMail,$dataUser));

        // Hủy Cart Session sau khi dặt hàng thành công
        Cart::destroy();

        // Thông báo qua cho admin có một đơn hàng vừa được thanh toán
        $message_notification = $dataUser['fullname'];
        $this->pusher('notification-channel', 'payment-event', $message_notification);
//        event(new PusherEvent($message_notification));
    }


    public function checkPaymentMethod(Request $request, DB $db)
    {
        $payment_method =  $request->get('payment_method');
        switch ($payment_method) {
            case "MOMO":
                return  $this->momo_payment($request,$db);
                break;
            case "COD":
                return $this->cod_payment($request,$db);
                break;
            default:
                $this->cod_payment($request,$db);
        }
    }
    public function store_notification(Request $request, $suer_id,$order_id,$message_notification)
    {
        $notification = new TableNotification();
        $notification->user_id = $suer_id;
        $notification->order_id = $order_id;
        $notification->title = $message_notification;
        $notification->is_read = 0;
        $notification->type = 'order';
        $notification->save();
    }
    public function validate_cart(Request $request){
        $validate = $request->validate([
            'fullname' => ['required', 'string','min:5', 'max:20'],
            'address' => ['required', 'string','min:5', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255'],
            'phone' => ['required', 'regex:/^(0?)(3[2-9]|5[6|8|9]|7[0|6-9]|8[0-6|8|9]|9[0-4|6-9])[0-9]{7}$/'],
            'city' => ['required', 'string'],
            'district' => ['required', 'string'],
            'ward' => ['required', 'string'],
        ],
        [
            "required" => ":attribute không được bỏ trống!",
            "string" => ":attribute nhập vào phải ở dạng chuỗi ký tự!",
            "min" => ":attribute nhập vào phải có ít nhất :min ký tự!",
            "max" => ":attribute chỉ cho phép nhập tối đa :max ký tự!",
            "email" => ":attribute nhập vào chưa đúng định dạng của email!",
            "regex" => ":attribute chưa đúng định dạng!"
        ],
        [
            "fullname" => "Họ tên",
            "email" => "Email",
            "address" => "Địa chỉ ",
            "phone" => "Số điện thoại",
            "city" => "Thành phố",
            "district" => "Quận/Huyện",
            "ward" => "Phường/Xã",
        ]
        );
    }

    public function ma_giam_gia(Request  $request){
        $dataCart= Cart::content();
        $promo_code =  $request->get('promo_code');
        $promotion_elo =  TablePromotion::where('code',$promo_code);
        $promotion = $promotion_elo->first();
        $isBelongToProduct = false;
      
        if($promo_code == ''){
            $alert = "<p class='font-weight-bold text-danger'>
               Bạn chưa nhập mã giảm giá
              </p>";
            $data = array(
                'alert' =>$alert,
            );
            return $data;
        }

        if(!$promotion){
            $alert = "<p class='font-weight-bold text-danger'>
               Mã giảm giá không tồn tại!
              </p>";
            $data = array(
                'alert' =>$alert,
            );
            return $data;

        }

        // Kiểm tra xem có mã giảm giá user nhập có tồn taị trong hệ thống không
        if($promotion)
        {
            // Kiểm tra xem mã giảm giá đó có thuộc product_id nào không
            if(!empty($promotion->product_id)){

                //check cart has product_id in table promotion
                foreach ($dataCart as $key => $value) {
                    if($value->id == $promotion->product_id){
                        $id = (int)$value->id;
                        $isBelongToProduct = !$isBelongToProduct;
                        break;
                    }
                }
                if(!$isBelongToProduct){
                    $sanpham = TableProduct::find($promotion->product_id);
                    $slug = $sanpham->slug;
                    $name = $sanpham->name;
                    $id = $sanpham->id;
                    $link = "/chi-tiet-san-pham/$slug/$id";

                    $alert = "Mã giảm giá này chỉ áp dụng cho sản phẩm: <a href='$link' target='_blank' class='font-weight-bold text-danger'>  $name (Mua ngay)  </a>";

                    $data = array(
                        'alert' =>$alert,
                    );
                    return $data ;
                }

        $is_check_exists = false;

        if(!empty($promotion->product_id)){
            //check cart has product_id in table promotion
            foreach ($dataCart as $key => $value) {
                if($value->id == $promotion->product_id){
                    $id = (int)$value->id;
                    $is_check_exists = !$is_check_exists;
                    break;
                }
            }
            if(!$is_check_exists){
                $result = "Mã khuyến mãi này chỉ áp dụng khi đơn hàng bạn có product_id là".$promotion->product_id;
                 return $result;
            }
        }

        //check total order
        $subTotal = Cart::total();
        $is_check_total = $subTotal >= $promotion->order_price_conditions;

        if(!$is_check_total){
            $order_price_conditions = number_format($promotion->order_price_conditions);
            $alert = "<p class='font-weight-bold text-danger'>
                Đơn hàng của bạn không đạt điều kiện khi tổng đơn hàng nhỏ hơn $order_price_conditions vnđ
              </p>";
            $data = array(
                'alert' =>$alert,
            );
            return $data ;
        }

        // lưu session tạm để check người dùng nhập nhiều lần
//        session([ 'temp_code' => $promo_code ]);
//        if($promo_code == Session::get('temp_code')){
//            $alert = 'Bạn đã nhập mã này rồi';
//            $data = array(
//                'alert' =>$alert,
//            );
//            return $data ;
//        }

        //success
        $total = $subTotal - ($subTotal*$promotion->discount_price/100);
        $totalText = number_format($subTotal - ($subTotal*$promotion->discount_price/100));
        $data = array(
            'total' =>$total,
            'totalText' =>$totalText
        );
        return $data ;

    }
}
