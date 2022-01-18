<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\BarangController;
use App\Http\Controllers\GeolocationController;
use App\Http\Controllers\UsersImportController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\ScoreboardController;

use App\Http\Controllers\API\MobileController;
use App\Http\Controllers\API\MoviesController;
use App\Http\Controllers\movieController;

use App\Http\Controllers\API\BooksController;


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

Route::get('/home', function () {
    return view('pages.blankpage');
})->name('home');

// Route::get('/', function () {
//     return view('pages.HALAMAN');
// });

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

Route::get('/excel', [UsersImportController::class, 'create']);
Route::post('/excel-import', [UsersImportController::class, 'store']);

Route::get('/dataCust', [UsersImportController::class, 'index']);

Route::get('/login', function () {
    return view('pages.login');
});

Route::get('login/google', [LoginController::class,'redirectToGoogle'])->name('login.google');
Route::get('login/google/callback', [LoginController::class,'handleGoogleCallback']);
Auth::routes();
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/logout',function(){
    Auth::logout();
    return  redirect ('/login');
})->name('logout');

//scoreboard
Route::get('/scoreboard', [ScoreboardController::class, 'scoreboard']);
Route::get('/scoreboard-controller', [ScoreboardController::class, 'index']);
Route::post('/scoreboard-controller/update', [ScoreboardController::class, 'store']);
Route::get('/messages', [ScoreboardController::class, 'message']);

//movies
Route::resource('/api/mobiles',MobileController::class);
//movie
Route::resource('/uploud-movie',movieController::class);
Route::get('/api/moviesnowplaying', [MoviesController::class,'getMoviesNP']); 
Route::get('/api/moviesbrowse', [MoviesController::class,'getMoviesBrowse']); 
Route::get('/api/moviescomingsoon', [MoviesController::class,'getMoviesCS']);

//BOOKS
Route::get('/book',[BooksController::class,'book']);
Route::get('/book/insertBook', [BooksController::class, 'create']);
Route::get('/book/editBook/{id}', [BooksController::class, 'edit']);
Route::post('/book/tambahBooks', [BooksController::class, 'tambahBook']);
Route::put('/book/updateBook/{id}', [BooksController::class, 'updateBook']);
Route::delete('/book/hapus/{id}', [BooksController::class, 'hapus']);