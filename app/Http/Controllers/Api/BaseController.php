<?php

namespace App\Http\Controllers\Api;

use Pusher\Pusher;
use App\Http\Controllers\Controller;
use Intervention\Image\Facades\Image;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\Storage;
use Pusher\PushNotifications\PushNotifications;

class BaseController extends Controller
{
    /**
     * success response method.
     *
     * @return \Illuminate\Http\Response
     */
    public function sendResponse($result = null, $message)
    {
    	$response = [
            'status' => true,
            'message' => $message,
            'data'    => $result,
        ];
        return response()->json($response, 200)->header('Accept', 'application/json');
    }


    /**
     * return error response.
     *
     * @return \Illuminate\Http\Response
     */
    public function sendError($error, $errorMessages = "", $code = 404)
    {
    	$response = [
            'status' => false,
            'message' => $error,
            'error' =>$errorMessages,
        ];

        return response()->json($response, $code);
    }

    public function uploadFile($request, $dir, $width, $height, $callback = null)
    {
        $files = $request->file('image');
        $count = count($files);
    
        if ($count == 0) {
            return;
        }
    
        $paths = [];
    
        foreach ($files as $file) {
            $filename = pathinfo($file->getClientOriginalName(), PATHINFO_FILENAME);
            $extension = $file->getClientOriginalExtension();
            $path = $filename . '_' . uniqid() . '.' . $extension;
    
            // Resize image
            $thumbnail = Image::make($file)->resize($width, $height, function ($constraint) {
                $constraint->aspectRatio();
                $constraint->upsize();
            })->encode(null);
    
            // Save thumbnail to storage
            $thumbnailPath = 'thumbnails/' . $dir . $path;
            Storage::disk('public')->put($thumbnailPath, (string) $thumbnail);
    
            $paths[] = $thumbnailPath;
        }
    
        if (is_callable($callback)) {
            $callback($paths);
        }
    
        if ($count == 1) {
            return $paths[0];
        }
    }
    

    public function sendNoti ($interests,$title,$body){
        $beamsClient = new PushNotifications(array(
            "instanceId" => env('PUSHER_BEAMS_INSTANCE_ID'),
            "secretKey" =>  env('PUSHER_BEAMS_SECRET_KEY'),
        ));

        $publishResponse = $beamsClient->publishToInterests(
            array($interests), // interests
            array("fcm" => array("notification" => array(
              "title" => $title,
              "body" => $body,
            ))),
        );
        return $publishResponse;
    }

    public function pusher($channel,$event,$data){
        $pusher = new Pusher(
            env('PUSHER_APP_KEY'),
            env('PUSHER_APP_SECRET'),
            env('PUSHER_APP_ID'),
            [
                'cluster' => env('PUSHER_APP_CLUSTER'),
                'useTLS' => true
            ]
        );
    
        // Phát sóng sự kiện `chat-message` trên kênh `chat-channel` với dữ liệu chat đã lấy được từ request
        $pusher->trigger($channel, $event, $data);
    }


}
