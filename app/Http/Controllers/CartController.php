<?php

namespace App\Http\Controllers;

use App\Models\TableProduct;
use Illuminate\Http\Request;
use Gloudemans\Shoppingcart\Facades\Cart;

class CartController extends Controller
{
    public function index()
    {
        // return Cart::destroy();

        $data = TableProduct::all();

        // return Cart::content();

        return View('template.order.order',compact('data'));

    }

    public function add(Request $request,$id)
    {
        $productById =  TableProduct::find($id);
        Cart::add([
            'id' => $id,
            'name' => $productById->name,
            'qty' => 1,
            'price' => $productById->sale_price,

            'discount' => $productById->discount,
            'code' => $productById->code,
            'slug' => $productById->slug,
            'options' => [
                'size' => 'M',
                'color' => 'Red',
                'magiamgia' => 'AAA',
                'sale_price' => $productById->sale_price,
                'photo' => $productById->photo,

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
            // "total" => number_format(Cart::total(), 0, ",", ".")."đ",
        ];
        echo json_encode($result);
    }

    public function checkout(){
        return view('template.order.checkout');
    }
}
