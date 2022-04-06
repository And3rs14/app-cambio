<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Info_value;
use Illuminate\Http\Request;
use App\Models\Category;
class Info_valueController extends Controller
{
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
        $request->validate([
            
            'date' => 'required|date',
            
            'category_id' => 'required|exists:categories,id',
            'value_id' => 'required|exists:values,id',
        ]);
        $info_values = Info_value::create($request->all());
        return $info_values;
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
        $request->validate([
            //faltaria un unique
            'date' => 'required|date',
            //|numeric?
            'category_id' => 'required|exists:categories,id',
            'value_id' => 'required|exists:values,id',
        ]);

        $info_values = Info_value::select('*')->where('id', $info_values)->update($request->all());
        $info_value = Info_value::select('*')->where('id', $info_values)->get();

        //$valor->update($request->all());
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
        $info_value = Info_value::select('*')->where('id', $info_values)->get();
        Info_value::select('*')->where('id', $info_values)->delete();
        
        return $info_value;
    }
}
