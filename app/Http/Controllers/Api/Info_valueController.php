<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Date;
use App\Models\Info_value;
use Illuminate\Http\Request;

class Info_valueController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //$info_values = Info_value::all();

        

        $info_values = Info_value::join("categories","categories.id", "=", "info_values.category_id")
        ->select("info_values.id","categories.name","info_values.sell_moneda","info_values.buy_moneda")
        ->join("dates","dates.id", "=", "info_values.date_id")
        ->select("info_values.id","categories.name","info_values.sell_moneda","info_values.buy_moneda","dates.date")->orderby("dates.date", "DESC")->paginate(10);


        
        return view('welcome', compact('info_values'));
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
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Info_value  $info_value
     * @return \Illuminate\Http\Response
     */
    public function show(Info_value $info_value)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Info_value  $info_value
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Info_value $info_value)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Info_value  $info_value
     * @return \Illuminate\Http\Response
     */
    public function destroy(Info_value $info_value)
    {
        //
    }
}
