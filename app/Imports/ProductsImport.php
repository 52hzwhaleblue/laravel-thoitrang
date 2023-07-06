<?php

namespace App\Imports;

use App\Models\TableProduct;
use Illuminate\Support\Str;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithStartRow;



class ProductsImport implements ToModel,WithStartRow
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new TableProduct([
//  CODE	NAME	SLUG	REGULAR_PRICE	DISCOUNT	SALE_PRICE	PROPERTIES	DESC	CONTENT	NUMB	TYPE	PHOTO	PHOTO1	VIEW	CATEGORY_ID	STATUS

            'code' =>  $row[0],
            'name' => $row[1],
            'slug' => $row[2],
            'regular_price' => $row[3],
            'discount' => $row[4],
            'sale_price' => $row[5],
            'properties' => $row[6],
            'desc' => $row[7],
            'content' => $row[8],
            'numb' => $row[9],
            'type' => $row[10],
            'photo' => $row[11],
            'photo1' => $row[12],
            'view' => $row[13],
            'category_id' => $row[14],
            'status' => $row[15],
        ]);
    }

    public function startRow():int
    {
        // bắt đầu đọc dự liệu tại dòng thứ 2
        return 2;
    }
}
