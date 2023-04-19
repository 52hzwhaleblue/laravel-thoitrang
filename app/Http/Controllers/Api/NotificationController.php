<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Pusher\PushNotifications\PushNotifications;
use App\Http\Controllers\Api\BaseController as BaseController;
use Illuminate\Support\Facades\Auth;

class NotificationController extends BaseController
{

   public function fetchData(Request $request,DB $dB)
   {
    try {
        $page = $request->query('page', 1);
        $type = $request->query('type');

        $limit = 10;

        $offset = ($page - 1) * $limit;

        $query = $dB::table('table_notifications');

        $query_detail = $dB::table('table_notification_detail');


        $user_id = Auth::id();

        $notifications = null;

        if(empty($type)){
            $notifications = $query
            ->where('user_id', $user_id)
            ->orWhere('user_id',null)
            ->orderByDesc('created_at')
            ->skip($offset)
            ->take($limit)
            ->get()
            ->map(function ($notification) use ($query_detail,$user_id){
               if($notification->type == "daily"){
                  $notification->detail = $query_detail
                  ->where('notification_id', $notification->id)
                  ->where('user_id', $user_id)
                  ->first(['id', 'notification_id', 'user_id', 'is_read']);
               }else{
                  $notification->detail = null;
               }
               return $notification;
            });
        }else{
          if($type == "daily"){
            $notifications = $query
            ->when($type, function ($query2, $type) {
                return $query2->where('type', $type);
            })
            ->orderByDesc('created_at')
            ->skip($offset)
            ->take($limit)
            ->get()
            ->map(function ($notification)use ($query_detail,$user_id) {
                $notification->detail =$query_detail
                    ->where('notification_id', $notification->id)
                    ->where('user_id', $user_id)
                    ->first(['id', 'notification_id', 'user_id', 'is_read']);

                return $notification;
            });
          }else{
            $notifications = $query
            ->when($type, function ($query2, $type) {
                return $query2->where('type', $type);
            })
            ->where('user_id',  $user_id)
            ->orderByDesc('created_at')
            ->skip($offset)
            ->take($limit)
            ->get()
            ->map(function ($notification) {
                $notification->detail = null;
                return $notification;
            });
          }
        }

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
