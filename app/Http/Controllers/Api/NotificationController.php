<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Pusher\PushNotifications\PushNotifications;
use App\Http\Controllers\Api\BaseController as BaseController;
use App\Models\TableNotification;
use App\Models\TableNotificationDetail;
use Illuminate\Support\Facades\Auth;

class NotificationController extends BaseController
{

   public function fetchData(Request $request,TableNotification $tableNoti)
   {
    try {
        $page = $request->query('page', 1);

        $limit = 7;

        $offset = ($page - 1) * $limit;

        $user_id = Auth::id();

        $notifications = $tableNoti::where('user_id', $user_id)
        ->where('type','user')
        ->orderByDesc('created_at')
        ->skip($offset)
        ->take($limit)
        ->get();
        


        return $this->sendResponse($notifications, 'Fetch notification successfully');
    } catch (\Throwable $th) {
        return $this->sendError($th->getMessage(), 500);
    }
   }


   public function create(Request $request){
      return $this->sendNotiToUser(Auth::id(),$request->title,$request->subtitle,"notification");
   }

   public function delete(Request $request){
        try{
            $db = new DB;
            $id = $request->query('id');
            if($id != -1){
                $db::table('table_notifications')
                ->where('id', $id)
                ->where('user_id',Auth::id())
                ->where('type','user')
                ->delete();

                return $this->sendResponse([], 'Delete notification successfully');
            }

            $db::table('table_notifications')
            ->where('user_id',Auth::id())
            ->where('type','user')
            ->delete();
            return $this->sendResponse([], 'Delete all  notification successfully');
            
        } catch (\Throwable $th) {
            return $this->sendError($th->getMessage(), 500);
        }
   }
}
