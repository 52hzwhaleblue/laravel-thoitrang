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
         



      }catch (\Throwable $th) {

         return $this->sendError($th->getMessage(), 500);
     }
   }

   public function create(Request $request){
      return $this->sendNotiToUser(Auth::id(),$request->title,$request->body,null,"notification");
   }
}
