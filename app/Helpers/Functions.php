<?php
namespace App\Helpers;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Route;


class Functions
{
    private $d;

    public static  function checkSlug($data = [])
    {
        $slug = $data['slug'];
        $id = $data['id'];

        $result = 'valid';

        if (!empty($slug)) {
            $table = [
                'table_categories',
                "table_products",
                "table_posts",
            ];
            if(!empty($id))  // cập nhật mới có id
            {
                $where = $id;
            }else{
                $where = '';
            }

            foreach ($table as $v) {
                $check = DB::table($v)
                    ->select('id')
                    ->where('id','!=' ,$where)
                    ->where('slug', '=', $slug)
                    ->get();

                $arrChecks = json_decode($check,true);

                foreach($arrChecks as $arrCheck){
                    if($arrCheck['id'] != '')
                    {
                        $result = 'exist';
                    }
                }
            }
        } else {
            $result = 'empty';
        }
        return $result;
    }

    public static function getTypeByCom(){
        $currentURI = Route::getFacadeRoot()->current()->uri();
        $com = explode('/', $currentURI);
        $type = $com[2];
        return $type;
    }

    public static function getThumbWidth($name){
        $width = 0;
        $menus = config('menu');

        foreach($menus as $m){
            if($m['name'] == $name){
                foreach($m['data'] as $m1){
                    foreach ($m1['thumbs'] as $k => $v) {
                        $width = $m1['thumbs']['width'];
                    }
                }
            }
        }
        return $width;
    }

    public static function getThumbHeight($name){
        $height = 0;
        $menus = config('menu');

        foreach($menus as $m){
            if($m['name'] == $name){
                foreach($m['data'] as $m1){
                    foreach ($m1['thumbs'] as $k => $v) {
                        $height = $m1['thumbs']['height'];
                    }
                }
            }
        }
        return $height;
    }
}

?>
