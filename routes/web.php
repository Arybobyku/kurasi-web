<?php

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\ProdukFormController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\ReportController;
use Illuminate\Support\Facades\Route;
use SebastianBergmann\CodeCoverage\Report\Html\Dashboard;

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

Route::get('/login', [LoginController::class,'index'] )->name('login')->middleware('guest');
Route::post('/login', [LoginController::class,'login'] )->name('admin.login.submit');
Route::get('/logout', [LoginController::class,'logout'])->name('logout');

Route::post('/add', [DashboardController::class,'addumkm'] )->name('add.umkm')->middleware('auth');
 Route::post('/update', [DashboardController::class,'update'] )->name('update.umkm')->middleware('auth');

Route::get('/', [DashboardController::class,'index'] )->name('home')->middleware('auth');
Route::get('/tambahumkm', [DashboardController::class,'add'] )->name('tambah')->middleware('auth');
Route::get('editdata/{id}', [DashboardController::class,'editview'] )->name('editdata')->middleware('auth');
Route::get('detail/{id}', [DashboardController::class,'detail'] )->name('detail')->middleware('auth');

Route::post('/terima', [DashboardController::class,'terima'] )->name('terima.umkm')->middleware('auth');
Route::post('/tolak', [DashboardController::class,'tolak'] )->name('tolak.umkm')->middleware('auth');


Route::post('/terimaValidasi', [DashboardController::class,'terimaValidasi'] )->name('terimaValidasi.umkm')->middleware('auth');
Route::post('/tolakValidasi', [DashboardController::class,'tolakValidasi'] )->name('tolakValidasi.umkm')->middleware('auth');

Route::get('/verify/{token}', [RegisterController::class,'verif'] )->name('verify');

// start umkm produk routes
Route::get('listProdukForm/{id}', [ProdukFormController::class,'listProductPage'] )->name('listProdukFormUMKM')->middleware('auth');
Route::get('tambahProdukFormUmkm/{id}', [ProdukFormController::class,'tambahProdukPage'] )->name('tambahProdukFormPage')->middleware('auth');
Route::post('tambahProdukFormUmkm', [ProdukFormController::class,'storeProdukFormUMKM'] )->name('tambahProdukFormPage.tambah')->middleware('auth');
Route::get('editProdukFormUmkm/{id}', [ProdukFormController::class,'editProdukFormUMKMPage'] )->name('editProdukFormPage')->middleware('auth');
Route::post('editProdukFormUmkm', [ProdukFormController::class,'updateProdukFormUMKM'] )->name('editProdukFormPage.store')->middleware('auth');
Route::get('detailProdukUmkm/{id}/{umkmId}', [ProdukFormController::class,'detailProdukFormUMKMPage'] )->name('detailProdukForm')->middleware('auth');
Route::delete('deleteProdukFormUmkm/{id}', [ProdukFormController::class,'deleteProdukFormUMKM'] )->name('deleteProdukForm')->middleware('auth');

Route::post('produkFormTerima', [ProdukFormController::class,'terima'] )->name('produkForm.terima')->middleware('auth');
Route::post('produkFormTolak', [ProdukFormController::class,'tolak'] )->name('produkForm.tolak')->middleware('auth');
// end umkm produk routes

Route::get("fast",[ReportController::class,"fast"]);
Route::get("all",[ReportController::class,"all"]);
Route::get("slow",[ReportController::class,"slow"]);
Route::get("umkm",[ReportController::class,"umkm"]);
Route::get("kota",[ReportController::class,"kota"]);
Route::get("kategori",[ReportController::class,"kategori"]);

Route::get("stock_all",[ReportController::class,"stock_all"]);
Route::get("stock_umkm",[ReportController::class,"stock_umkm"]);
Route::get("stock_kategori",[ReportController::class,"stock_kategori"]);
Route::get("stock_outdate",[ReportController::class,"stock_outdate"]);
Route::get("stock_zero",[ReportController::class,"stock_zero"]);