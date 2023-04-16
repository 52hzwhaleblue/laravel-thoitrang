<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Pusher\PushNotifications\PushNotifications;
use App\Http\Controllers\Api\BaseController as BaseController;
use Illuminate\Support\Facades\Auth;

class NotificationController extends BaseController
{

   public function fetchData(Request $request){
      try{
         $page = request()->query('page',1);
         
         $limit = 5;

         $offset = ($page - 1) * $limit;

         $notifications = DB::table('table_notifications')
            ->where(function ($query) {
               $query->where('user_id', Auth::id())
                     ->orWhere('user_id', null);
            })
            ->skip($offset)
            ->take($limit)
            ->get();

         return $this->sendResponse($notifications,"Fetch notification successfully");

      }catch (\Throwable $th) {

         return $this->sendError($th->getMessage(), 500);
     }
   }

   public function create(Request $request){
      return $this->sendNotiToUser(Auth::id(),$request->title,$request->body,null,"notification");
   }
}
