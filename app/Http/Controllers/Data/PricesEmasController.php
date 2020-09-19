<?php

namespace App\Http\Controllers\Data;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\PricesEmas;

class PricesEmasController extends Controller
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
        $data = PricesEmas::orderBy('id')->get();

        return view('data.pricesemas.index')->with(compact('data'));
    }

    public function create()
    {

        $pricesemas = PricesEmas::orderBy('id')->first();
        return view('data.pricesemas.form');
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
            $response = PricesEmas::insert($request->except(['_token']));
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

        $pricesemas = PricesEmas::orderBy('id')->get();
        return view('data.pricesemas.form')->with(compact('pricesemas'));
    }

    public function edit($id)
    {

        $pricesemas = PricesEmas::find($id);
        return view('data.pricesemas.form')->with(compact('pricesemas'));
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
            $response = PricesEmas::findOrFail($id);
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
            $response = PricesEmas::findOrFail($id)->delete();
        } catch (Throwable $e) {
            return back()->withError($exception->getMessage())->withInput();
        }
        return back()->withError($response)->withInput();
    }

 
}
