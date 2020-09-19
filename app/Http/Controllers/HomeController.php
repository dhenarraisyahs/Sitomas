<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Product;
use App\Pengaturan;
use App\PricesEmas;

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

        $hargaemas  = 19394;
        $usd        = 14849;

        $data = Product::orderBy('id')->get();
        $countproduct = $data->count();

        $persen = PricesEmas::first()->value('persen');

        $goldprice = $hargaemas * $usd / 28.3495;
        $markupprice = $goldprice * $persen / 100;

        return view('home')->with(compact('persen','countproduct','goldprice','usd','markupprice'));
    }
}
