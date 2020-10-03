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

//home
Route::get('/', ['uses'=>'App\Http\Controllers\HomeController@getIndex', 'as'=>'home.getindex']);
//adding produto
Route::post('/', ['uses'=>'App\Http\Controllers\HomeController@postIndex', 'as'=>'home.postindex']);
//updating produto
Route::get('/edit/{id}', ['uses'=>'App\Http\Controllers\HomeController@getUpdateProd', 'as'=>'home.getupdateindex']);
Route::put('/', ['uses'=>'App\Http\Controllers\HomeController@putUpdateProd', 'as'=>'home.putupdateindex']);
//delete produto
Route::get('/delete/{id}', ['uses'=>'App\Http\Controllers\HomeController@deleteProd', 'as'=>'home.deleteindex']);