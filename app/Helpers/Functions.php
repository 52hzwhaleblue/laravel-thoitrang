<?php
namespace App\Helpers;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Route;


class Functions
{
    private $d;

    public function checkSlug($data = [])
    {
        $result = 'valid';
        // Kiểm tra xem có slug tồn tại trong database chưa
        $slug = $data->slug;
        // die($slug);

        $id = $data->id;
        if (!empty($slug)) {
            $table = [
                'table_product_lists',
                "table_product_cats",
                "table_products",
                // "table_news",
            ];
            if(!empty($data['id']))  // cập nhậ mới có id
            {
                $where = $data['id'];
            }else{
                $where = '';
            }

            foreach ($table as $v) {
                $check = DB::table($v)
                    ->select('id')
                    ->where('id','!=' ,$where)
                    ->where('slug', '=', $slug)
                    ->get();

            // dd($check);


                // dd(json_decode($check,true));
                $arrChecks = json_decode($check,true);

                foreach($arrChecks as $arrCheck){
                    // if($arrCheck['slug'] == $slug)
                    // {
                    //     $result = 'exist';
                    // }

                    if($arrCheck['id'] != '')
                    {
                        $result = 'exist';
                    }

                }
            }
        } else {
            $result = 'empty';
        }
        // die($result);
        return $result;
    }

    function getTypeByCom(){
        $currentURI = Route::getFacadeRoot()->current()->uri();
        $com = explode('/', $currentURI);
        $type = $com[2];
        return $type;
    }
}

?>
