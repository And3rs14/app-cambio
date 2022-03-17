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
    public function show(values $values)
    {
        return $values;
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\values  $values
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, values $values)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\values  $values
     * @return \Illuminate\Http\Response
     */
    public function destroy(values $values)
    {
        //
    }
}
