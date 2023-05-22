<?php

namespace App\Exports;

use App\Models\TableProduct;
use Maatwebsite\Excel\Concerns\FromCollection;

class ProductsExport implements FromCollection
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return TableProduct::all()->except('properties');
    }

    public function map($user): array
    {
        return [
            $user->name,
            $user->email,
            Date::dateTimeToExcel($user->created_at),
        ];
    }
}
