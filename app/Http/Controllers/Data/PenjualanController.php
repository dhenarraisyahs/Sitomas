<?php

namespace App\Http\Controllers\Data;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Penjualan;
use App\Customer;
use App\Product;

class PenjualanController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

        /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = Penjualan::orderBy('id')->get();

        return view('data.penjualan.index')->with(compact('data'));
    }

    public function create()
    {
        $product        = Product::orderBy('name')->get();
        $customer       = Customer::orderBy('name')->get();

        return view('data.penjualan.form')->with(compact('product','customer'));
    }

}

