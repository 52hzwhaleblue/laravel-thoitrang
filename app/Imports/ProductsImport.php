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
            'id' =>  $row[0],
            'code' =>  $row[1],
            'name' => $row[2],
            'slug' => $row[3],
            'regular_price' => $row[4],
            'sale_price' => $row[5],
            'desc' => $row[6],
            'status' => $row[7],
        ]);
    }

    public function startRow():int
    {
        return 2;
    }
}
