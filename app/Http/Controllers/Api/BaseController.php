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
            
            $image = Image::make($file);
            // Resize image
            $thumbnail = $image->resize($image->width(), $image->height(), function ($constraint) {
                //$constraint->aspectRatio();
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

    public function uploadPhoto($request, $dir, $width, $height)
    {
        if ($request->has('photo')) {
                $file = $request->file('photo');
                $filename = pathinfo($file->getClientOriginalName(), PATHINFO_FILENAME);
                $extension = $file->getClientOriginalExtension();
                $path_file = $filename . '_' . uniqid() . '.' . $extension;

                // Resize image
                $thumbnail_image = Image::make($file)->fit($width, $height, function ($constraint) {
                    $constraint->aspectRatio();
                    $constraint->upsize();
                })->encode(null);

                // Save thumbnail to storage
                $thumbnail_path = 'thumbnails/'. $dir  . $path_file;

                Storage::disk('public')->put($thumbnail_path, (string) $thumbnail_image->encode());

                return $thumbnail_path;

        }
    }
    public function uploadPhoto1($request, $dir, $width, $height)
    {
        if ($request->has('photo1')) {
                $file = $request->file('photo1');
                $filename = pathinfo($file->getClientOriginalName(), PATHINFO_FILENAME);
                $extension = $file->getClientOriginalExtension();
                $path_file = $filename . '_' . uniqid() . '.' . $extension;

                // Resize image
                $thumbnail_image = Image::make($file)->fit($width, $height, function ($constraint) {
                    $constraint->aspectRatio();
                    $constraint->upsize();
                })->encode(null);

                // Save thumbnail to storage
                $thumbnail_path = 'thumbnails/'. $dir  . $path_file;

                Storage::disk('public')->put($thumbnail_path, (string) $thumbnail_image->encode());

                return $thumbnail_path;

        }
    }

    public function uploadRowDetailPhoto($request, $dir, $width, $height)
    {
        if ($request->has('file')) {
                $file = $request->file('file');
                $filename = pathinfo($file->getClientOriginalName(), PATHINFO_FILENAME);
                $extension = $file->getClientOriginalExtension();
                $path_file = $filename . '_' . uniqid() . '.' . $extension;

                // Resize image
                $thumbnail_image = Image::make($file)->resize($width, $height, function ($constraint) {
                    $constraint->aspectRatio();
                    $constraint->upsize();
                })->encode(null);

                // Save thumbnail to storage
                $thumbnail_path = 'thumbnails/'. $dir  . $path_file;

                Storage::disk('public')->put($thumbnail_path, (string) $thumbnail_image->encode());

                return $thumbnail_path;

        }
    }



    public function sendNotiAllDevice($interests,$title,$body,$image= null,$type){
        $beamsClient = new PushNotifications(array(
            "instanceId" => env('PUSHER_BEAMS_INSTANCE_ID'),
            "secretKey" =>  env('PUSHER_BEAMS_SECRET_KEY'),
        ));

        $options = [
            "apns" => [
                "aps" => [
                    "alert" => [
                        "title" =>$title,
                        "body" => $body,
                    ],
                    "mutable-content" => 1,
                ],
                "data" => [
                    "name" => "adam",
                    "type" => "user",
                 ],

            ],
            "fcm" => [
                "notification" => [
                    "title" =>$title,
                    "body" => $body,
                ],
                "data" => [
                    "image" => $image,
                    "type" => $type,
                 ],
            ],

        ];
        $publishResponse = $beamsClient->publishToInterests(
            [$interests], // interests
            $options,
        );
        return $publishResponse;
    }

    public function sendNotiToUser($userId,$title,$body,$type= null){
        $beamsClient = new PushNotifications(array(
            "instanceId" => env('PUSHER_BEAMS_INSTANCE_ID'),
            "secretKey" =>  env('PUSHER_BEAMS_SECRET_KEY'),
        ));

        $options = [
            "apns" => [
                "aps" => [
                  "alert" => $title,
                ],
            ],
            "fcm" => [
                "notification" => [
                  "title" => $title,
                  "body" => $body,
                ],
                "data" => [
                    "type" => $type,
                 ],
              ],
        ];
        $publishResponse = $beamsClient->publishToUsers(
            [(string)$userId], // interests
            $options,
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
