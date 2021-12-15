<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;


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
    return view('landing');
});

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/detail/{id}', 'DetailController@index')->name('detail');

Route::middleware('auth')->group(function () {

    Route::get('/home/create', 'HomeController@create')->name('create');
    Route::post('/home/store', 'HomeController@store')->name('create.store');

    Route::post('/detail/{id}/transaksi', 'DetailController@store');
    Route::get('/notifikasi', 'DetailController@history')->name('notifikasi');
    Route::get('/notifikasi/{uuid}/terima', 'DetailController@terima')->name('notifikasi.terima');
    Route::get('/notifikasi/{uuid}/tolak', 'DetailController@tolak')->name('notifikasi.tolak');
    Route::get('/notifikasi/{uuid}/waiting', 'DetailController@tungguPenyedia')->name('notifikasi.tungguPenyedia');
    Route::get('/notifikasi/{uuid}/waiting/service', 'DetailController@konfirmasiPenyedia')->name('notifikasi.konfirmasiPenyedia');
    Route::get('/notifikasi/{uuid}/sudah', 'DetailController@sudahPerbaiki')->name('notifikasi.sudahPerbaiki');
    Route::get('/notifikasi/{uuid}/belum', 'DetailController@belumPerbaiki')->name('notifikasi.belumPerbaiki');
    Route::post('/notifikasi/{uuid}/bayar', 'DetailController@deskripsiDanHarga')->name('notifikasi.bayar');
    Route::get('/notifikasi/{uuid}/bayar/bank', 'DetailController@bayarKlien')->name('notifikasi.bayar.bank');
    Route::get('/notifikasi/{uuid}/bayar/konfirmasi', 'DetailController@konfirmasiBayarPenyedia')->name('notifikasi.bayar.konfirmasi');

    Route::get('/profile', 'ProfileController@index')->name('profile');
    Route::post('/profile', 'ProfileController@update')->name('profile.update');

    Route::get('/mypost', 'MyPostController@show')->name('mypost');
    Route::get('/mypost/{id}/update', 'MyPostController@showupdate');
    Route::post('/mypost/{id}', 'MyPostController@update');


});
