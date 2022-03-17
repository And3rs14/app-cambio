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
        $Info_values = Info_values::all();
        return $Info_values;
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
