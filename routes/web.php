<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\MainController;
use App\Http\Controllers\SkuController;
use App\Http\Controllers\StockController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use SimpleSoftwareIO\QrCode\Facades\QrCode;

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

Route::get('/', [MainController::class, 'index']);
Route::get('/item/{id}', [MainController::class, 'item'])->name('item');

Route::resource('/admin', AdminController::class)->middleware('auth');
Route::resource('/stock', StockController::class)->middleware('auth');
Route::resource('/category', CategoryController::class)->middleware('auth');
Route::resource('/sku', SkuController::class)->middleware('auth');

Route::put('/stock/{stock}/active', [StockController::class, 'active'])->middleware('auth');
Route::put('/stock/{stock}/disable', [StockController::class, 'disable'])->middleware('auth');


Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
