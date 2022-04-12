<?php

namespace App\Http\Controllers;

use App\Models\Info_value;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $info_values = Info_value::join("categories","categories.id", "=", "info_values.category_id")
        ->select("info_values.id","categories.name","info_values.sell_moneda","info_values.buy_moneda")
        ->join("dates","dates.id", "=", "info_values.date_id")
        ->select("info_values.id","categories.name","info_values.sell_moneda","info_values.buy_moneda","dates.date")
        ->join("users","users.id", "=", "info_values.user_id")
        ->select("info_values.id","categories.name as category","info_values.sell_moneda","info_values.buy_moneda","dates.date","users.name as user")
        ->get();

        return view('home', compact('info_values'));
    }
}
