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
Auth::routes();

Route::get('/', function () {
    return view('welcome');
});

Route::get('charts', 'ShortLinkController@charts');

Route::resource('/home', 'ShortLinkController');

Route::get('/search', 'ShortLinkController@search');

Route::get('{code}', 'ShortLinkController@shortenLink')->name('shorten.link');