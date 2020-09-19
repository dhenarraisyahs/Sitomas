<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
//Data Utama
Route::resource('product','Data\ProductController');
Route::resource('mahkota','Data\MahkotaController');
Route::resource('cabinet','Data\CabinetController');
Route::resource('categories','Data\CategoriesController');
Route::resource('customer','Data\CustomerController');
Route::resource('transaksi','TransaksiController');
//Keuangan
Route::resource('penjualan','Data\PenjualanController');
Route::resource('balance','Data\FundController');
//Setting
Route::resource('pengaturan','Data\PengaturanController');
Route::resource('pricesemas','Data\PricesEmasController');


//API
Route::get('api/getproduct','APIController@getProductAPI');
Route::get('api/getmarkprice','APIController@getMarkPricesAPI');

//Route Dari Template 
Route::get('/', function () {
    return view('layouts/master');
});
Auth::routes();

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

//select 2
Route::get('/get_data', 'ProductSearchController@getData');
Route::get('/get_product/{id}', 'ProductSearchController@getProduct');
Route::get('/get_customer', 'CustomerSearchController@getData');
Route::get('/get_balance', 'BalanceSearchController@getData');
//laporan
Route::get('/report_transaction', 'ReportTransaksiController@getReport')->name('report_trx');
Route::get('/return/pdf/{daterange}', 'ReportTransaksiController@returnReportPdf')->name('report.trx_pdf');
    
//invoice
Route::get('/{id}/print', 'TransaksiController@generateInvoice')->name('transaksi.print');

