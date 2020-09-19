<?php

namespace App\Http\Controllers\Data;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Fund;
use App\FundsRecords;
use App\Cashflow;

class CashflowController extends Controller
{
    protected $data;

    public function __construct()
    {
        $this->data = array();
    }

    public function index()
    {
        $this->data['balance'] = Fund::orderBy('name','asc')->get();
        return view('data.cashflow.index')->with($this->data);
    }

    public function store(Request $request)
    {
        $date = date("Y-m-d", strtotime($request->date));
        $row = new Cashflow;
        $row->fund_id = $request->fund_id;
        $row->catatan = $request->catatan;
        $row->date = $date;
        $row->nominal = $request->nominal;
        $row->type = $request->type;
        $row->save();

        if($row->exists){
            return response()->json([
                'success' => true,
                'message' => "Data telah disimpan!",
            ]);
        }else{
            return response()->json([
                'success' => false,
                'message' => "Terjadi kesalahan!",
            ]);
        }
    }

    public function update(Request $request, $id)
    {
        // $row = Service::find($id);
        // $row->user_id = $request->user_id;
        // $row->name = $request->name;
        // $row->payment = $request->payment;
        // $row->price = $request->price;
        // $row->status = $request->status;
        // $row->description = $request->description;
        // $row->save();

        // if($row->exists){
        //     return response()->json([
        //         'success' => true,
        //         'message' => "Data telah terupdate!",
        //     ]);
        // }else{
        //     return response()->json([
        //         'success' => false,
        //         'message' => "Terjadi kesalahan!",
        //     ]);
        // }
    }

    public function destroy(Request $request,$id)
    {
        $row = Cashflow::find($id)->delete();
        
        if($row){
            return response()->json([
                'success' => true,
                'message' => "Data telah terhapus!",
            ]);
        }else{
            return response()->json([
                'success' => false,
                'message' => "Terjadi kesalahan!",
            ]);
        }
    }

    public function view($id)
    {

    }
}
