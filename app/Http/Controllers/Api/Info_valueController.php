<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Info_value;
use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Date;
use App\Models\Historical;
use App\Models\User;

class Info_valueController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:api')->except(['index', 'show']);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $info_values = Info_value::all();
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
        $user = auth()->user();

        $data = request()->validate([
            'sell_moneda' => 'required|numeric|between:0.00,99.99',
            'buy_moneda' => 'required|numeric|between:0.00,99.99',
            'category_id' => 'required|exists:categories,id',
            'date' => 'required|date_format:Y-m-d',
        ]);


        
        $date = Date::create([
            'date' => $data['date'],
            //'info_value_id' => $info_value->id, 
        ]);
        $info_values = Info_value::create([
            'sell_moneda' => $data['sell_moneda'],
            'buy_moneda' => $data['buy_moneda'],
            'category_id' => $data['category_id'],
            'date_id' => $date->id,
        ]);
        
        

        //$info_values = Info_value::create($request->all());
        return $info_values;

        //return redirect()->route('users.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Info_value  $info_value
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $info_value = Info_value::with('categories')->findOrFail($id);
        return $info_value;

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Info_value  $info_value
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $info_values)
    {
        $info_value = Info_value::find($info_values);
        $date = $info_value->date_id;
        $date = Date::find($date);
        
        $data = request()->validate([
            'sell_moneda' => 'required|numeric|between:0.00,99.99',
            'buy_moneda' => 'required|numeric|between:0.00,99.99',
            'category_id' => 'required|exists:categories,id',
            'date' => 'required|date_format:Y-m-d',
        ]);
        $date->date = $data['date'];
        $info_value->sell_moneda = $data['sell_moneda'];
        $info_value->buy_moneda = $data['buy_moneda'];
        $info_value->category_id = $data['category_id'];
        $info_value->date_id = $date->id;
        
        $date->push();
        $info_value->push();

        //$info_values = Info_value::create($request->all());
        return $info_value;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Info_value  $info_value
     * @return \Illuminate\Http\Response
     */
    public function destroy($info_values)
    {
        
        $info_value = Info_value::find($info_values);
        Info_value::destroy($info_values);
        
        return  $info_value;
    }
}
