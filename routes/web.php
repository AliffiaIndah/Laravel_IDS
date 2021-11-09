<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\BarangController;
use App\Http\Controllers\GeolocationController;



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

Route::get('/', function () {
    return view('pages.blankpage');
});

Route::get('/dataCustomer', [CustomerController::class, 'indexCustomer'])->name('dataCustomer');
Route::get('/tambahCustomer', [CustomerController::class, 'list']);
Route::post('/inputCustomer', [CustomerController::class, 'inputCustomer'])->name('inputCustomer');

Route::get('/tambahCustomer2', [CustomerController::class, 'list2']);
Route::post('/inputCustomer2', [CustomerController::class, 'inputCustomer2'])->name('inputCustomer2');
Route::get('/findKota', [CustomerController::class, 'findKota'])->name('findKota');
Route::get('/findKecamatan', [CustomerController::class, 'findKecamatan'])->name('findKecamatan');
Route::get('/findKelurahan', [CustomerController::class, 'findKelurahan'])->name('findKelurahan');
Route::get('/findKodepos', [CustomerController::class, 'findKodepos'])->name('findKodepos');


Route::get('/dataBarang', [BarangController::class,'indexBarang']);
Route::get('/barcode',[BarangController::class,'barcode'])->name('generate.barcode');
Route::get('/tambahBarang',[BarangController::class,'tambahBarang']);
Route::post('/inputBarang',[BarangController::class,'inputBarang'])->name('inputBarang');
// Route::get('/pdf',[BarangController::class,'print'])->name('print');
Route::get('/generate-pdf', [BarangController::class, 'generatePDF']);
Route::post('/cetak_pdf', [BarangController::class, 'cetak_pdf'])->name('cetak_pdf');
Route::post('/cetak_pdf2', [BarangController::class, 'cetak_pdf2']);

// Route::get('/generate-pdf', [BarangController::class, 'generatePDF'])->name('generate');
Route::get('/cetakpdf/{id_barang}/{col}/{row}', [BarangController::class, 'generatePDF']);;



Route::get('/scanner',[BarangController::class,'scanbarcode']);

Route::get('/list_toko', [GeolocationController::class, 'list_toko']);
Route::get('/input_titik', [GeolocationController::class, 'input_titik']);
Route::post('/input_toko',[GeolocationController::class,'input_toko'])->name('input_toko');
Route::get('/scan-toko', [GeolocationController::class, 'scan_toko']);
Route::get('/findToko', [GeolocationController::class, 'findToko']);






Route::get('/toko_barcode{id}', [GeolocationController::class, 'toko_barcode']);
Route::get('toko-barcode/{id}', [GeolocationController::class,'toko_barcode'])->name('toko-barcode');
