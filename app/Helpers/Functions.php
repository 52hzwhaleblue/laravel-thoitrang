<?php
namespace App\Helpers;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Route;


class Functions
{
    private $d;

    public static function getSizeProduct( $product_id,$color)
    {
        $sizes = DB::table('table_product_details')->select('size')
            ->where('product_id',$product_id)
            ->where('color',$color)
            ->first();
        return json_encode(explode(" ",$sizes->size));

    }
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

            if(!empty($id))  // lúc đầu khi tạo mới sẽ ko có id, cập nhật mới có id
            {
                $where = $id;
            }else{
                $where = '';
            }
            // => Khi tạo mới $where sẽ bằng rỗng

            foreach ($table as $v) {
                $check = DB::table($v)
                    ->select('id')
                    ->where('id','!=' ,$where)
                    ->where('slug', '=', $slug)
                    ->get();
                // $check lấy ra id kiểm tra xem có id nào đã tồn tại hay chưa (slug đã toồn tại)
                $arrChecks = json_decode($check,true);

                foreach($arrChecks as $arrCheck){
                    // nếu như có id => đã có slug => slug đã tồn tại
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

    public static function getTypeByComAdmin(){
        $currentURI = Route::getFacadeRoot()->current()->uri();
        $com = explode('/', $currentURI);
        $type = $com[2];
        return $type;
    }

    public static function getTypeByCom(){
        $currentURI = Route::getFacadeRoot()->current()->uri();
        $com = explode('/', $currentURI);
        $type = end($com);
        return $type;
    }

    public static function getThumbWidth($name){
        $width = 0;
        $menus = config('menu');
        $type = Functions::getTypeByComAdmin();

        foreach($menus as $m){
            if($m['name'] == $name){
                foreach($m['data'] as $k1 => $m1){
                    if($k1 == $type){
                        foreach ($m1['thumbs'] as $k => $v) {
                            $width = $m1['thumbs']['width'];
                        }
                    }
                }
            }
        }
        return $width;
    }

    public static function getThumbHeight($name){
        $height = 0;
        $menus = config('menu');
        $type = Functions::getTypeByComAdmin();

        foreach($menus as $m){
            if($m['name'] == $name){
                foreach($m['data'] as $k1 => $m1){
                    if($k1 == $type){
                        foreach ($m1['thumbs'] as $k => $v) {
                            $height = $m1['thumbs']['height'];
                        }
                    }
                }
            }
        }
        return $height;
    }
}

?>
