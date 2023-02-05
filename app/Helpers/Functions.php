<?php
namespace App\Helpers;

use Illuminate\Support\Facades\DB;

class Functions
{
    private $d;

    public function checkSlug($data = [])
    {
        $result = 'valid';
        // Kiểm tra xem có slug tồn tại trong database chưa
        $slug = $data->slug;
        $id = $data->id;
        if (!empty($slug)) {
            $table = [
                'table_product_lists',
                // "table_product_cats",
                // "table_products",
                // "table_news",
            ];

            $where = 'id!=' . $id;

            foreach ($table as $v) {
                $check = DB::table($v)
                    ->select('id')
                    ->where('id', '!=', $id)
                    ->get();

                if (!empty($check['id'])) {
                    $result = 'exist';
                    break;
                }
            }
        } else {
            $result = 'empty';
        }
        // die($result);
        return $result;
    }
}

?>
