<?php

namespace App\Http\Controllers\Admin;


use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;

class NotificationController extends Controller
{
    public function index()
    {
        // $list_notifications = TableNotification::where('type','chat')->get();

        $list_notifications = DB::table('table_notifications')
            ->select(DB::raw("'COUNT'(type) as count"))
            ->groupBy('type')
            ->get();
        dd($list_notifications);

        return view('admin.app',compact('list_notifications'));
    }
}
