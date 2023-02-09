<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function index()
    {
        $menus = config('menu');
        foreach ($menus as $k => $v) {
            if ($k == 'post') {
                // chỉ duyệt bài viết
                foreach ($v['data'] as $k1 => $v1) {
                    $view = $v1['view'];
                }
                $datas = $v['data'];
            }
        }
        return view('admin.template.post.'.$view.'.news', compact('datas'));
    }

    public function create()
    {
        $menus = config('menu');
        foreach ($menus as $k => $v) {
            if ($k == 'post') {
                // chỉ duyệt bài viết
                foreach ($v['data'] as $k1 => $v1) {
                    $view = $v1['view'];
                }
                $datas = $v['data'];
            }
        }
        return view('admin.template.post.' . $view . '.news_add')->with('datas',$datas);
    }

    public function store(Request $request)
    {
        //
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
}
