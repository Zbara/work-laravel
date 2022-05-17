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


Route::get('/')->name('main')->uses('App\Http\Controllers\MainController@index');
Route::post('/model')->name('model')->uses('App\Http\Controllers\MainController@model');
Route::post('/result')->name('result')->uses('App\Http\Controllers\MainController@result');
