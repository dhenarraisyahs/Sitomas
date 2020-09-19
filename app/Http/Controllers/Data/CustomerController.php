<?php

namespace App\Http\Controllers\Data;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;


use App\Customer;

class CustomerController extends Controller
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
        $data = Customer::orderBy('id')->get();

        return view('data.customer.index')->with(compact('data'));
    }

    public function create()
    {

        $customer = Customer::orderBy('id')->first();
        return view('data.customer.form');
    }

        /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        try {
            $response = Customer::insert($request->except(['_token']));
            return redirect()->back()->with(['messages'=>'Data telah ter input!']);

        } catch (Throwable $e) {
            return redirect()->back()->with(compact('e'));
        }

    }

        /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {

        $customer = Customer::orderBy('id')->get();
        return view('data.customer.form')->with(compact('customer'));
    }

    public function edit($id)
    {

        $customer = Customer::find($id);
        return view('data.customer.form')->with(compact('customer'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        try {
            $response = Customer::findOrFail($id);
            $input = $request->except(['_token']);
            $response->fill($input)->save();
        } catch (Throwable $e) {
            return back()->withError($exception->getMessage())->withInput();
        }
        return back()->withError($response)->withInput();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        try {
            $response = Customer::findOrFail($id)->delete();
        } catch (Throwable $e) {
            return back()->withError($exception->getMessage())->withInput();
        }
        return back()->withError($response)->withInput();
    }
}
