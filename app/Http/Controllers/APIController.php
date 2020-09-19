<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Product;
use App\PricesEmas;


class APIController extends Controller
{
    public function getProductAPI(){
        $data = Product::select('id','kode','name','rfid','weight','gambar')->get()->where('status', 0);

        return response()->json($data);
    }

    public function getMarkPricesAPI(){

        $hargaemas  = 19394;
        $usd        = 14849;

        $data = Product::orderBy('name')->get()->where('status', 1);

        $persen = PricesEmas::first()->value('persen');

        $goldprice = $hargaemas * $usd / 28.3495;
        $markupprice = $goldprice * $persen / 100;
        $markupgoldprice = $goldprice + $markupprice;

        $data = number_format($markupgoldprice, 0, ',', '.');

        return response()->json($data);
    }

}
