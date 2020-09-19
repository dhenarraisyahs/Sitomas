<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Transaction;
use App\TransactionDetail;
use App\Product;
use App\Pengaturan;
use App\Fund;
use PDF;
use DB;
use Carbon\Carbon;

class TransaksiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        function convert_to_rupiah($angka)
        {
            return 'Rp' . strrev(implode('.', str_split(strrev(strval($angka)), 3)));
        }
        $items = Transaction::with('customer', 'customer.transactions')->orderBy('created_at', 'DESC')->get();
        // dd($items);
        return view('data.transaksi.index')->with([
            'items' => $items
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $thisDay = date('ymd');
        $randNum = rand(1, 9999);
        $kode_trx = 'TRX' . $thisDay . $randNum;
        $ldate = date('Y-m-d');
        return view('data.transaksi.create')->with([
            'kode_trx' => $kode_trx,
            'ldate' => $ldate
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */

    public function store(Request $request)
    {
        function convertNumber($rupiah)
        {
            $asal = $rupiah;
            $l = preg_replace('/,.*|[^0-9]/', '', $asal);
            $hasil = intval($l);
            return $hasil;
        }
    //     function convert_to_number($rupiah)
	// {
	// 	return intval(preg_replace(/,.*|[^0-9]/, '', $rupiah));
	// }
        $data = $request->all();

        $trx = new Transaction;
        $trx->kode_trx = $request->input('kode_trx');
        $n_discount = convertNumber($request->input('n_discount'));
        $total_trx = convertNumber($request->input('total_trx'));
        $subtotal_trx = convertNumber($request->input('subtotal_trx'));
        $trx->percent_discount = $request->input('percent_discount');
        $trx->discount = $n_discount;
        $trx->total_trx = $total_trx;
        $trx->subtotal_trx = $subtotal_trx;
        $trx->customer_id = $request->input('customer_id');
        $trx->balance_id = $request->input('balance_id');

        // dd($trx);

        $trxDetails = array();
        // dd($data);
        foreach ($request->input('TransactionDetails') as $key => $value) {
            $trxDetail = new TransactionDetail;
            // dd($value);
            $trxDetail->product_id = $value['product_id'];
            $trxDetail->product_price = convertNumber($value['product_price']);
            $trxDetails[] = $trxDetail;
            // dd($trxDetail);
            Product::where('id', $value['product_id'])->update(['status' => 0]);
        }
        // dd($request->input('TransactionDetails'));

        $trx->save();
        $trx->details()->saveMany($trxDetails);

        Fund::where('id', $trx->balance_id)->update(['nominal' => DB::raw("nominal+" . $trx->total_trx)]);

        return redirect()->route('transaksi.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $item = Transaction::with(['customer', 'details', 'details.product'])->findOrFail($id);
        // dd($item);
        return view('data.lov.lovProduct')->with([
            'item' => $item
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $item = Transaction::with(['customer', 'details', 'details.product'])->findOrFail($id);
        // dd($item);
        return view('data.lov.lovProduct')->with([
            'item' => $item
        ]);
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $item = Transaction::findOrFail($id);
        // dd($item);
        $item->delete();

        // function updateFund($id)
        // {
        //     $item = Transaction::findOrFail($id);
        //     Fund::where('id', $item->balance_id)->update(['nominal' => DB::raw("nominal-" . $item->total_trx)]);
        //     return redirect()->route('transaksi.index');
        // }
        TransactionDetail::where('kode_trx', $id)->delete();
        // updateFund($id);
        return redirect()->route('transaksi.index');
    }

    public function generateInvoice($id)
    {
        //GET DATA BERDASARKAN ID
        $item = Transaction::with(['customer', 'details', 'details.product'])->find($id);
        $toko = Pengaturan::findOrfail('1');
        // dd($toko);
        //LOAD PDF YANG MERUJUK KE VIEW PRINT.BLADE.PHP DENGAN MENGIRIMKAN DATA DARI INVOICE
        //KEMUDIAN MENGGUNAKAN PENGATURAN LANDSCAPE A4
        $pdf = PDF::loadView('data.invoice.print', compact('item', 'toko'))->setPaper('a4', 'potrait');
        return $pdf->stream();
    }
}
