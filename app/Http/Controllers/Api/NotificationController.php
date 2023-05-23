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

   public function updateReadNoti(Request $request,DB $dB){
    try {
        $idNoti = $request->idNoti;

        $type = $request->type;

        $user_id  = Auth::id();

        if (empty($type)) {
            return $this->sendResponse([], "Failed notification");
        }

        $query = $dB::table('table_notifications')
                  ->where('type', $type)->where('user_id', $user_id);
               
        if ($idNoti != -1) {

            $query = $query->where('id', $idNoti);
        }
        
        $dB::beginTransaction();

       
           
            $query->update([
               'is_read' => 1,
            ]);
       
        $dB::commit();

        return $this->sendResponse([], "Updated notification");
      }catch(\Throwable $th){
        $dB::rollBack();
         return $this->sendError($th->getMessage(), 500);
      }

   }
}
