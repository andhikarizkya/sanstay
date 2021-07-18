<?php

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
    return view('beranda');
});

Route::get('/welcome', function () {
    return view('welcome');
});

Route::get('/data_homestay', function () {
    return view('data_homestay');
});

Route::group(['middleware' => ['auth','checkRole:dinas,user,pemilik']],function(){
    Route::get('/welcome', 'HomeController@index')->name('home');
});

Route::group(['middleware' => ['auth','checkRole:dinas']],function(){
	Route::resource('data-homestay-dinas','TimDinasController');
	Route::view('/laporan-umpan-balik', 'TimDinas/form_umpan_balik');
	Route::post('submit', 'UmpanBalikLaporanController@save');
});

Route::group(['middleware' => ['auth', 'checkRole:pemilik']], function(){
	Route::resource('data-homestay','PemilikHomestayController');
});

Route::group(['middleware' => ['auth', 'checkRole:user']], function(){
	Route::resource('data-homestay-user', 'PengunjungController');
	Route::get('/laporan-umpan-balik-user', 'UmpanBalikLaporanController@index');
});
	Route::resource('laporan', 'LaporanController');