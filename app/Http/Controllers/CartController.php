<?php

namespace App\Http\Controllers;

use App\Models\TableCategory;
use App\Models\TableNotification;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\DB;
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

class CartController extends Controller
{
    public function index()
    {
        $data = Cart::content();
        return View('template.order.order',compact('data'));
    }

    public function add(Request $request,$id)
    {
        $productById =  TableProduct::find($id);
        // dd($productById->regular_price);
        Cart::add([
            'id' => $id,
            'name' => $productById->name,
            'qty' => 1,
            'price' => $productById->sale_price,
            'options' => [
                'size' => 'M',
                'color' => 'Red',
                'discount' => $productById->discount,
                'sale_price' => $productById->sale_price,
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


    public function store(Request $request,DB $db){
        $this->validate_cart($request);

        // Dữ liệu giỏ hàng
         $dataCart= Cart::content();

        // Dữ liệu người dùng
        $dataUser = [
            'user_id' => $request->get('user_id'),
            'fullname' => $request->get('fullname'),
            'email' => $request->get('email'),
            'phone' => $request->get('phone'),
            'address' => $request->get('address'),
            'city' => $request->get('city'),
            'district' => $request->get('district'),
            'ward' => $request->get('ward'),
            'payment_method' => $request->get('payment_method'),
        ];

        $user_id = $request->get('user_id');
        $code_order = 'UNI'.Str::random(5);
        // $db::beginTransaction(); // bat dau giao dich

        // $db::rollback(); // quay lai ko them vao du lieu

        // $db::commit(); //them vao database
        $db::transaction(function () use ($request,$user_id,$dataUser,$dataCart,$code_order) {
            // Lưu vào table_order
            $order = TableOrder::create([
                'code' => $code_order,
                'user_id' => $user_id,
                'shipping_fullname' => $dataUser['fullname'],
                'shipping_phone' => $dataUser['phone'],
                'shipping_address' => $dataUser['address'],
                'temp_price' => (int)Cart::total(),
                'total_price' => (int)Cart::total(),
                'payment_method' => $dataUser['payment_method'],
                'status' => 1,
            ]);

            // Lưu vào table_order_details
            foreach ($dataCart as $kcart => $vcart) {
                TableOrderDetail::create([
                    'order_id' => $order->id,
                    'product_id' => $vcart->id,
                    'color' => $vcart->options->color,
                    'size' => $vcart->options->size,
                    'quantity' => $vcart->qty,
                ]);
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
            "total" => Cart::total(),
            "time_now" => Carbon::now()->format('d/m/Y m:h:s'),
            'dataCart' =>Cart::content(),
        ];
        dispatch(new SendMailJob($dataMail,$dataUser)); // thêm vào hàng đợi
        // Hủy Cart Session sau khi dặt hàng thành công
        Cart::destroy();

        $message_notification ="Đơn hàng của khách hàng ".$dataUser['fullname'];
        event(new PusherEvent($message_notification));

        return redirect()->route('index')->with('CartToast',' Bạn đã thanh toán thành công');
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

    public function ma_giam_gia(){
        $promo_code = request()->input('promo_code');
        $promotion_elo =  TablePromotion::where('code',$promo_code);

        $promotion = $promotion_elo->first();

        $is_check_exists = false;

        if(!empty($promotion->product_id)){
            //check order has product_id in table promotion
            $dataCart= Cart::content();

            foreach ($dataCart as $key => $value) {
                if($value->id == $promotion->product_id){
                    $id = (int)$value->id;
                    $is_check_exists = !$is_check_exists;
                    break;
                }
            }
            if(!$is_check_exists){
                 return "Mã khuyến mãi này chỉ áp dụng khi đơn hàng bạn có product_id là".$promotion->product_id;
            }
        }

        //check total order
        $total = Cart::total();

        $is_check_total = $total >= $promotion->order_price_conditions;

        if(!$is_check_total){
            return "Đơn hàng của bạn không đạt điều kiện khi tổng đơn nhỏ hơn".$promotion->order_price_conditions;
        }

        //success
        $promotion_elo->update([
            "limit" => --$promotion->limit,
        ]);
        return $total - $promotion->discount_price;
    }
}
