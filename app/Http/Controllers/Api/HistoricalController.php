<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Historical;
use Illuminate\Http\Request;

class HistoricalController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $historicals = Historical::all();
        return $historicals;
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = request()->validate([
            'info_value_id' => 'required|exists:info_values,id',
            'user_id' => 'required|exists:users,id',
        ]);
        $historicals = Historical::create([
            'info_value_id' => $data['info_value_id'],
            'user_id' => $data['user_id']
        ]);
        return $historicals;
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Historical  $historical
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $historicals = Historical::with('info_values')->findOrFail($id);
        return $historicals;
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Historical  $historical
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,$historicals)
    {
        $historical = Historical::find($historicals);

        
        $data = request()->validate([
            'info_value_id' => 'required|exists:info_values,id',
            'user_id' => 'required|exists:users,id',
        ]);
        $historical->info_value_id = $data['info_value_id'];
        $historical->user_id = $data['user_id'];
        

        $historical->push();

        //$info_values = Info_value::create($request->all());
        return $historical;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Historical  $historical
     * @return \Illuminate\Http\Response
     */
    public function destroy($historicals)
    {
        $historical = Historical::find($historicals);
        Historical::destroy($historicals);
        
        return  $historical;

    }
    
}
