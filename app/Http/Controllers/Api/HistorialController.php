<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\historial;
use Illuminate\Http\Request;

class HistorialController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $historials = historial::all();
        return $historials;
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
            'fecha_consulta' => 'required|date',
            //|numeric?
            'info_value_id' => 'required|exists:info_values,id',
            'user_id' => 'required|exists:users,id',
        ]);
        $historials = historial::create($request->all());
        return $historials;
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\historial  $historial
     * @return \Illuminate\Http\Response
     */
    public function show($historial)
    {
        $historial = historial::select('*')->where('id', $historial)->get();
        return $historial;
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\historial  $historial
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $historial)
    {
        $request->validate([
            //faltaria un unique
            'fecha_consulta' => 'required|date',
            //|numeric?
            'info_value_id' => 'required|exists:info_values,id',
            'user_id' => 'required|exists:users,id',
        ]);

        $historial = historial::select('*')->where('id', $historial)->update($request->all());
        $historial = historial::select('*')->where('id', $historial)->get();

        //$valor->update($request->all());
        return $historial;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\historial  $historial
     * @return \Illuminate\Http\Response
     */
    public function destroy($historial)
    {
        //
        $historials = historial::select('*')->where('id', $historial)->get();
        historial::select('*')->where('id', $historial)->delete();
        
        return $historials;
    }
}
