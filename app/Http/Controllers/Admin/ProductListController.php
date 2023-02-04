<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\TableProductList;
use Cviebrock\EloquentSluggable\Services\SlugService;
use Livewire\Component;

class ProductListController extends Controller
{
    public $slug;

    public function index()
    {
        $data = TableProductList::all();
        return view('admin.template.product.list.list',compact('data'));
    }

    public function create()
    {
        return view('admin.template.product.list.list_add');
    }

    public function store(Request $request)
    {
        $count = TableProductList::all()->count();

        if($request->has('photo')){
            $file= $request->photo;
            $ext = $request->photo->extension();//lấy đuôi file png||jpg
            $file_name = Date('Ymd').'-'.'productList'.$count.'.'.$ext;
            $file->move(public_path('backend/assets/img/products'),$file_name);//chuyển file vào đường dẫn chỉ định
        }

        $ProductList = new TableProductList;

        $ProductList->slug = $request->get('slug');
        $ProductList->name = $request->get('name');
        $ProductList->desc = $request->get('desc');
        $ProductList->content = $request->get('content');
        if($request->has('photo')){
            $ProductList->photo = $file_name;
        }
        $ProductList->status = implode(',', $request->get('status'));

        $ProductList->save();
        return redirect()->route('admin.product.product-list.index')->with('message', 'Bạn đã tạo danh mục cấp 1 thành công!');
    }

    public function show($id)
    {
        //
    }
    public function edit($id)
    {
        //
    }

    public function update(Request $request, $id)
    {
        //
    }

    public function destroy($id)
    {
        //
    }

    public function checkSlug(){
        die(1);
        $this->slug = SlugService::createSlug(TableProductList::class, 'slug', $this->name);

        return response()->json(['slug' => $slug]);

    }
}
