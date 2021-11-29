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
    Route::post('/home', 'HomeController@store')->name('home');

    Route::get('/mypost', 'MyPostController@show')->name('mypost');
    Route::get('/mypost/{id}/update', 'MyPostController@showupdate');
    Route::post('/mypost/{id}', 'MyPostController@update');
});
