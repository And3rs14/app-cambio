<?php

namespace App\Exports;

use App\Models\Info_value;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class Info_valueExport implements FromCollection, WithHeadings
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        $datos = Info_value::join("categories","categories.id", "=", "info_values.category_id")
        ->select("info_values.id","categories.name","info_values.sell_moneda","info_values.buy_moneda")
        ->join("dates","dates.id", "=", "info_values.date_id")
        ->select("info_values.id as ID","categories.name as Categoria","info_values.sell_moneda as [Precio venta]","info_values.buy_moneda as [Precio compra]","dates.date as Fecha")->get();
        return $datos;
    }

    public function headings(): array
    {

        return [
            "ID","Categoria ","Precio venta ","Precio compra","Fecha"
        ];

    }
}
