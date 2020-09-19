<?php

namespace App\Http\Controllers\Data;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Pengaturan;
use Storage;

class PengaturanController extends Controller
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
        $data = Pengaturan::orderBy('id')->get();

        return view('data.pengaturan.index')->with(compact('data'));
    }

    public function create()
    {

        $pengaturan = Pengaturan::orderBy('id')->first();
        return view('data.pengaturan.form');
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
            $response = Pengaturan::insert($request->except(['_token']));
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

        $pengaturan = Pengaturan::orderBy('id')->first();
        return view('data.pengaturan.form')->with(compact('pengaturan'));
    }

    public function edit($id)
    {

        $pengaturan = Pengaturan::orderBy('id')->first();
        return view('data.pengaturan.form')->with(compact('pengaturan'));
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
            $response = Pengaturan::findOrFail($id);
            $name = $response->gambar;
            if (preg_match('/^data:image\/(\w+);base64,/', $request->gambare)) {
                Storage::disk('product')->delete($response->gambar);
                $data = substr($request->gambare, strpos($request->gambare, ',') + 1);

                $data = base64_decode($data);
                $name = date('mdYHis').".png";
                $path = Storage::disk('product')->put($name, $data);
            }

            $response->name = $request->name;
            $response->alamat = $request->alamat;
            $response->notel = $request->notel;
            $response->nofax = $request->nofax;
            $response->email = $request->email;
            $response->subtext = $request->subtext;
            $response->gambar = $name;
            $response->save();
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
            $response = Pengaturan::findOrFail($id)->delete();
        } catch (Throwable $e) {
            return back()->withError($exception->getMessage())->withInput();
        }
        return back()->withError($response)->withInput();
    }


}
