<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\URL;
use Illuminate\Support\Facades\DB;

use Functions;

use App\Models\TableNotification;

class HomeController extends Controller
{


    public function index()
    {
        $menus = config('menu');
        $type_notifications = DB::table('table_notifications')
                 ->select('type')
                 ->groupBy('type')
                 ->get();

        $list_notifications = DB::table('table_notifications')->get()
        ->map(function($type_notifications){
            $type_notifications->type = TableNotification::find($type_notifications->type);
            return $type_notifications;
        },);

        $count_notifications= TableNotification::where('is_read','=','0')->get();

        // dd( count($count_notifications));

        return view('admin.app',compact('type_notifications','list_notifications','count_notifications'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
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
