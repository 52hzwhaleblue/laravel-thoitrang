<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
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

        return view('admin.template.post.' . $view . '.news')->with('datas',$datas);
        // return view('admin.template.post.'.$view.'.man', compawct('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
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

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
