<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Date;
use App\Models\Info_value;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Rules\Daterepeat;
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
        ->select("info_values.id","categories.name","info_values.sell_moneda","info_values.buy_moneda","dates.date")->get();


        
        return view('welcome', compact('info_values'));
    }

    public function create()
    {
        return view('appCambio.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //$categorias = 2;

        $id = Auth::id();

        $data = request()->validate([
            'sell_moneda' => 'required|numeric|between:0.01,99.99',
            'buy_moneda' => 'required|numeric|between:0.01,99.99',
            'category_id' => 'required|exists:categories,id',
            'date' => ['required','date_format:Y-m-d','before:tomorrow', new Daterepeat()]
        ],
        [
            'sell_moneda.required' => 'Ingrese un dato',
            'buy_moneda.required' => 'Ingrese un dato',
            'category_id.required' => 'Seleccione una categoria',
            'date.required' => 'Ingrese una fecha',
            'sell_moneda.numeric' => 'Ingrese un número',
            'sell_moneda.numeric' => 'Ingrese un número',
            'category_id.exists' => 'Esa categoria no existe',
            'date.date_format' => 'Ingrese una fecha en formato Y-m-d',
            'sell_moneda.beetween' => 'Ingrese un número positivo',
            'buy_moneda.beetween' => 'Ingrese un número positivo',
            'date.before' => 'Ingrese una fecha anterior a mañana',
        ]
        
        );

        $date = Date::select('*')->where('date', $data['date'])->first();

        Info_value::create([
            'sell_moneda' => $data['sell_moneda'],
            'buy_moneda' => $data['buy_moneda'],
            'category_id' => $data['category_id'],
            'date_id' => $date->id,
            'user_id' => $id
        ]);
        
        // return sizeof($b);

        return redirect('/home');
        //return view('appCambio.create', compact('info_values'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Info_value  $info_value
     * @return \Illuminate\Http\Response
     */
    public function show(Info_value $info_value)
    {
        
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Info_value  $info_value
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        
        $info_value = Info_value::find($id);
        $date = $info_value->date_id;
        $date = Date::find($date);
        

        return view('appCambio.edit', compact('info_value', 'date'));
    }

    public function update(Request $request, $info_values)
    {
        
        
        $info_value = Info_value::find($info_values);
        $date = $info_value->date_id;
        $date = Date::find($date);
        $id = Auth::id();

        $data = request()->validate([
            'id' => 'required|numeric',
            'sell_moneda' => 'required|numeric|between:0.00,99.99',
            'buy_moneda' => 'required|numeric|between:0.00,99.99',
            'category_id' => 'required|exists:categories,id',
            'date' => ['required','date_format:Y-m-d','before:tomorrow', new Daterepeat()],
        ],
        [
            'sell_moneda.required' => 'Ingrese un dato',
            'buy_moneda.required' => 'Ingrese un dato',
            'category_id.required' => 'Seleccione una categoria',
            'date.required' => 'Ingrese una fecha',
            'sell_moneda.numeric' => 'Ingrese un número',
            'sell_moneda.numeric' => 'Ingrese un número',
            'category_id.exists' => 'Esa categoria no existe',
            'date.date_format' => 'Ingrese una fecha en formato Y-m-d',
            'sell_moneda.beetween' => 'Ingrese un número positivo',
            'buy_moneda.beetween' => 'Ingrese un número positivo',
            'date.before' => 'Ingrese una fecha anterior a mañana',
        ]
        );

        $date->date = $data['date'];
        $info_value->sell_moneda = $data['sell_moneda'];
        $info_value->buy_moneda = $data['buy_moneda'];
        $info_value->category_id = $data['category_id'];
        $info_value->date_id = $date->id;
        $info_value->user_id = $id;
        
        $date->push();
        $info_value->push();

        //$info_values = Info_value::create($request->all());
        

        return redirect('/home');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Info_value  $info_value
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {

        $info_value = Info_value::find($id);
        $date = Date::where('id', $info_value->date_id);
        $references = Info_value::all()->where('date_id', $info_value->date_id);
        $categorias = 2;

        if (sizeof($references) < $categorias) {
            $date->delete();
        }

        $info_value->delete();

        //Info_value::destroy($id);
        
        return redirect('/home');
    }
}
