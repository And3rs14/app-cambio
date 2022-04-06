<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\values;
use Illuminate\Http\Request;

class ValueController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $values = values::all();
        return $values;
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
            'sell_moneda' => 'required|numeric|between:0.00,99.99',
            'buy_moneda' => 'required|numeric|between:0.00,99.99',
        ]);

        $values = values::create($request->all());
        return $values;
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\values  $values
     * @return \Illuminate\Http\Response
     */
    //Antes era public function show(values $values)
    public function show($id)
    {

        $value = Values::with('categories')->findOrFail($id);

        
        
        return $value;
        //$valor = value::select('*')->where('id', $values)->get();
        //return $valor;
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\values  $values
     * @return \Illuminate\Http\Response
     */

    //Antes era public function update(Request $request, values $values)
    public function update(Request $request,$values)
    {
        $request->validate([
            'sell_moneda' => 'required|numeric|between:0.00,99.99',
            'buy_moneda' => 'required|numeric|between:0.00,99.99',
        ]);
        $values = values::select('*')->where('id', $values)->update($request->all());
        $valor = values::select('*')->where('id', $values)->get();

        //$valor->update($request->all());
        return $valor;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\values  $values
     * @return \Illuminate\Http\Response
     */
    public function destroy($values)
    {
        //
        $value = values::select('*')->where('id', $values)->get();
        values::select('*')->where('id', $values)->delete();
        
        return $value;
    }
}
