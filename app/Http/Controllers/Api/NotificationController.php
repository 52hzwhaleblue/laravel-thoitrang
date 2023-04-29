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

   public function fetchData(Request $request,TableNotification $tableNoti,TableNotificationDetail $tableNotiDetail)
   {
    try {
        $page = $request->query('page', 1);

        $limit = 10;

        $offset = ($page - 1) * $limit;

        $user_id = Auth::id();

        $notifications = $tableNoti::
        where('user_id', $user_id)
        ->orWhere('user_id',null)
        ->orderByDesc('created_at')
        ->skip($offset)
        ->take($limit)
        ->get();
        
        $response = [
            'chats' => [],
            'daily' => [],
            'orders' => [],
        ];

        foreach ($notifications as $notification) {
            if ($notification->type === 'chat') {
                $response['chats'][] = $notification;
            } elseif ($notification->type === 'daily') {
                $response['daily'][] = $notification;
            } elseif ($notification->type === 'order') {
                $response['orders'][] = $notification;
            }
        }

        return $this->sendResponse($response, 'Fetch notification successfully');
    } catch (\Throwable $th) {
        return $this->sendError($th->getMessage(), 500);
    }
   }


   public function create(Request $request){
        

      return $this->sendNotiToUser(Auth::id(),$request->title,$request->body,null,"notification");
   }

   public function updateReadNoti(Request $request){
    try {
        $idNoti = (int) $request->idNoti;

        $type = $request->type;

        $user_id  = Auth::id();

        if (empty($type)) {
            return $this->sendResponse([], "Failed notification");
        }

        if($type == "daily"){
            $user_id =  null;
        }

        $query = DB::table('table_notifications')
                  ->where('type', $type)->where('user_id', $user_id);
               
        if ($idNoti != -1) {

            $query = $query->where('id', $idNoti);
        }
        
        DB::beginTransaction();

        if ($type == "daily") {

            if ($idNoti != -1) {

               DB::table('table_notification_detail')
                  ->insert([
                  'notification_id' => $idNoti,
                  'user_id' => $user_id,
                  'is_read' => 1,
                  'created_at' => now(),
                  'updated_at' => now(),
               ]);
            
            }else{
      
               $details = $query->get()->map(function ($notification) {
                  return [
                      'notification_id' => $notification->id,
                      'user_id' => Auth::id(),
                      'is_read' => 1,
                      'created_at' => now(),
                      'updated_at' => now(),
                  ];
              })->toArray();
  
              DB::table('table_notification_detail')->insert($details);
            }

        }else{
           
            $query->update([
               'is_read' => 1,
            ]);
        }
       
        DB::commit();

        return $this->sendResponse([], "Updated notification");
      }catch(\Throwable $th){
         DB::rollBack();
         return $this->sendError($th->getMessage(), 500);
      }

   }
}
