<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Info_values;
use Illuminate\Http\Request;

class Info_valuesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        /* $Info_values = Info_values::join("categories","categories.id", "=", "info_values.category_id")->select("info_values.id","info_values.date","categories.name","info_values.value_id")->join("values","values.id", "=", "info_values.value_id")->select("info_values.id","info_values.date","categories.name","values.sell_moneda","values.buy_moneda")->get();
            
        return $Info_values; */
        
        $info_values = Info_values::all();
        return $info_values;

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $request->validate([
            //faltaria un unique
            'date' => 'required|date',
            //|numeric?
            'category_id' => 'required|exists:categories,id',
            'value_id' => 'required|exists:values,id',
        ]);
        $info_values = Info_values::create($request->all());
        return $info_values;
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Info_values  $info_values
     * @return \Illuminate\Http\Response
     */
    public function show($info_values)
    {
        $info_values = Info_values::select('*')->where('id', $info_values)->get();
        return $info_values;

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Info_values  $info_values
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $info_values)
    {
        //
        $request->validate([
            //faltaria un unique
            'date' => 'required|date',
            //|numeric?
            'category_id' => 'required|exists:categories,id',
            'value_id' => 'required|exists:values,id',
        ]);

        $info_values = Info_values::select('*')->where('id', $info_values)->update($request->all());
        $info_value = Info_values::select('*')->where('id', $info_values)->get();

        //$valor->update($request->all());
        return $info_value;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Info_values  $info_values
     * @return \Illuminate\Http\Response
     */
    public function destroy($info_values)
    {
        //
        $info_value = Info_values::select('*')->where('id', $info_values)->get();
        Info_values::select('*')->where('id', $info_values)->delete();
        
        return $info_value;
    }
}
