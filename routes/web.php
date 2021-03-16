<?php

use App\Http\Controllers\productController;
use Illuminate\Support\Facades\Auth;
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

Route::get('/', 'dashboardController@index')->name('dashboard');

Auth::routes(['register' => false]);

Route::get('product/{id}/gallery', 'productController@gallery')->name('products.gallery');
Route::resource('products', 'productController');

Route::resource('product-galleries', 'productGalleryController');

Route::get('transactions/{id}/status', 'transactionController@setStatus')->name('transactions.status');
Route::resource('transactions', 'transactionController');


