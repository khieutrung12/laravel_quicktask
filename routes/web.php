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

Route::get('/lang/{locale}', 'LanguageController@switchLanguage')->name('lang');

Route::get('/', 'AdminController@index');
Route::resource('/products', 'ProductController');
Route::resource('/brands', 'BrandController');
