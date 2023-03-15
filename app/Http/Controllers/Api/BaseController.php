<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Intervention\Image\Facades\Image;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\Storage;

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

    public function uploadFile($request, $dir, $width, $height)
    {
        if ($request->has('image')) {    
            foreach ($request->file('image') as $file) {
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
    }

}
