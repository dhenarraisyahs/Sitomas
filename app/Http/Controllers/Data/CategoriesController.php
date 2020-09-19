<?php

namespace App\Http\Controllers\Data;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Categories;

class CategoriesController extends Controller
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
        $data = Categories::orderBy('id')->get();

        return view('data.categories.index')->with(compact('data'));
    }

    public function create()
    {

        $categories = Categories::orderBy('id')->first();
        return view('data.categories.form');
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
            $response = Categories::insert($request->except(['_token']));
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

        $categories = Categories::orderBy('id')->get();
        return view('data.categories.form')->with(compact('categories'));
    }

    public function edit($id)
    {

        $categories = Categories::find($id);
        return view('data.categories.form')->with(compact('categories'));
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
            $response = Categories::findOrFail($id);
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
            $response = Categories::findOrFail($id)->delete();
        } catch (Throwable $e) {
            return back()->withError($exception->getMessage())->withInput();
        }
        return back()->withError($response)->withInput();
    }
}
