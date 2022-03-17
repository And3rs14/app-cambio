<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Info_values;
use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Values;
use Dotenv\Parser\Value;

class Info_valuesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        /* $info_Values = Info_values::all();
        $datas = array();
        foreach ($info_Values as $value) {
            $id = Info_values::select('id')->get();
            $date = Info_values::select('date')->get();
            $category = Category::select('name')->where('id', $value->category_id)->get();
            $sell_moneda = Values::select('sell_moneda')->where('id', $value->value_id)->get();
            $buy_moneda = Values::select('buy_moneda')->where('id', $value->value_id)->get();

            $data = [
                'id'=> $id, 
                'date'=>  $date,
                'category'=> $category,
                'sell_moneda' => $sell_moneda,
                'buy_moneda' => $buy_moneda
            ];
            $datas[] = $data;
        } */

        $Info_values = Info_values::join("categories","categories.id", "=", "info_values.category_id")->select("info_values.id","info_values.date","categories.name","info_values.value_id")->join("values","values.id", "=", "info_values.value_id")->select("info_values.id","info_values.date","categories.name","values.sell_moneda","values.buy_moneda")->get();
        
        return view('Info_values.index')->with('Info_values', $Info_values);
        //return view('Info_values.index')->with($datas);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */

    public function create()
    {
        //
        return view('Info_values.create');
    }
    
    public function store(Request $request)
    {
        //
        //return view('Info_values.store');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Info_Values  $info_Values
     * @return \Illuminate\Http\Response
     */
    public function show(Info_Values $info_Values)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Info_Values  $info_Values
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Info_Values $info_Values)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Info_Values  $info_Values
     * @return \Illuminate\Http\Response
     */
    public function destroy(Info_Values $info_Values)
    {
        //
    }
}
