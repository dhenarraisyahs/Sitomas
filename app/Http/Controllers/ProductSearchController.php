<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Product;
use App\PricesEmas;

class ProductSearchController extends Controller
{
    public function getData(Request $request)
    {
        if ($request->has('q')) {
            $cari = $request->q;
            $data = Product::orderBy('name')
                ->where('status', 1)
                ->where('rfid', 'LIKE', "%$cari%")
                ->get();
            return response()->json($data);
        }
    }
    public function getProduct($id){
        $hargaemas  = 19394;
        $usd        = 14849;

        $items = Product::orderBy('name')->get()->where('status', 1);
        $persen = PricesEmas::first()->value('persen');

        $goldprice = $hargaemas * $usd / 28.3495;
        $markupprice = $goldprice * $persen / 100;
        $markupgoldprice = $goldprice + $markupprice;
        
        $data = Product::findOrFail($id);
        $data['price'] = $data['weight'] * $markupgoldprice;
        return json_encode($data);
    }

}
