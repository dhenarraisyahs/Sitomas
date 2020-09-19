<?php

namespace App\Http\Controllers\Data;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Product;
use App\Emas;
use App\Mahkota;
use App\Cabinet;
use App\Categories;
use App\PricesEmas;

use Storage;

class ProductController extends Controller
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
        $hargaemas  = 19394;
        $usd        = 14849;

        $data = Product::orderBy('name')->get()->where('status', 1);

        $persen = PricesEmas::first()->value('persen');

        $goldprice = $hargaemas * $usd / 28.3495;
        $markupprice = $goldprice * $persen / 100;
        $markupgoldprice = $goldprice + $markupprice;

        return view('data.product.index')->with(compact('data','markupgoldprice'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Categories::orderBy('name')->get();
        $emas       = Emas::orderBy('name')->get();
        $mahkota    = Mahkota::orderBy('name')->get();
        $cabinet    = Cabinet::orderBy('name')->get();


        return view('data.product.form')->with(compact('categories','emas','mahkota','cabinet'));
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
            if (preg_match('/^data:image\/(\w+);base64,/', $request->gambare)) {
                $data = substr($request->gambare, strpos($request->gambare, ',') + 1);

                $data = base64_decode($data);
                $name = date('mdYHis').".png";
                $path = Storage::disk('product')->put($name, $data);
            }

            $response = new Product;
            $response->kode = $request->kode;
            $response->categories_id = $request->categories_id;
            $response->emas_id = $request->emas_id;
            $response->mahkota_id = $request->mahkota_id;
            $response->cabinet_id = $request->cabinet_id;
            $response->name = $request->name;
            $response->weight = $request->weight;
            $response->nominal = $request->nominal;
            $response->rfid = $request->rfid;
            $response->detail = $request->detail;
            $response->gambar = $name;
            $response->save();
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

        $product    = Product::find($id);
        $categories = Categories::orderBy('name')->get();
        $emas       = Emas::orderBy('name')->get();
        $mahkota    = Mahkota::orderBy('name')->get();
        $cabinet    = Cabinet::orderBy('name')->get();

        return view('data.product.form')->with(compact('categories','emas','mahkota','cabinet','product'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $product = Product::find($id);
        $categories = Categories::orderBy('name')->get();
        $emas = Emas::orderBy('name')->get();
        $mahkota = Mahkota::orderBy('name')->get();
        $cabinet = Cabinet::orderBy('name')->get();

        return view('data.product.form')->with(compact('categories','emas','mahkota','cabinet','product'));
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
            $response = Product::findOrFail($id);
            $name = $response->gambar;
            if (preg_match('/^data:image\/(\w+);base64,/', $request->gambare)) {
                Storage::disk('product')->delete($response->gambar);
                $data = substr($request->gambare, strpos($request->gambare, ',') + 1);

                $data = base64_decode($data);
                $name = date('mdYHis').".png";
                $path = Storage::disk('product')->put($name, $data);
            }

            $response->kode = $request->kode;
            $response->categories_id = $request->categories_id;
            $response->emas_id = $request->emas_id;
            $response->mahkota_id = $request->mahkota_id;
            $response->cabinet_id = $request->cabinet_id;
            $response->name = $request->name;
            $response->weight = $request->weight;
            $response->nominal = $request->nominal;
            $response->rfid = $request->rfid;
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
            $response = Product::findOrFail($id);
            Storage::disk('product')->delete($response->gambar);
            $response->delete();
        } catch (Throwable $e) {
            return back()->withError($exception->getMessage())->withInput();
        }
        return back()->withError($response)->withInput();
    }
}
