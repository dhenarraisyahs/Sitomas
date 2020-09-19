<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Customer;

class CustomerSearchController extends Controller
{
    public function getData(Request $request)
    {
        if ($request->has('q')) {
            $cari = $request->q;
            $data = Customer::orderBy('name')
                ->where('name', 'LIKE', "%$cari%")
                ->get();
            return response()->json($data);
        }
    }
}
