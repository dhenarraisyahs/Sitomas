<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Transaction;
use App\Customer;
use PDF;
use Carbon\Carbon;
use App\Pengaturan;

class ReportTransaksiController extends Controller
{
    public function getReport()
    {
        $transactions = Transaction::orderBy('created_at')
            ->get();

        return view('data.transaksi.report')->with([
            'transactions' => $transactions
        ]);
    }
    public function returnReportPdf($daterange)
    {
        $dateArray = explode('+', $daterange);
        $startDate = $dateArray[0];
        $endDate = $dateArray[1];
        // $start = Carbon::parse($startDate);
        // $end = Carbon::parse($endDate);
        $toko = Pengaturan::findOrfail('1');
        $orders = Transaction::with(['customer'])->whereBetween('created_at', [$startDate, $endDate])->get();
        $pdf = PDF::loadView('data.transaksi.pdf_report', compact('orders', 'startDate','endDate','toko'))->setPaper('a4', 'landscape');
        return $pdf->stream();
    }
}
