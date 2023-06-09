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

Route::get('/','rphController@show');
Route::get('/rph','rphController@show');
Route::get('/rph_table','rphController@table');
Route::post('/rph','rphController@form');
Route::get('/setup_jadual','rphController@setup_jadual');
Route::get('/rph_pdf','rphController@rph_pdf');
Route::get('/rph_prev','rphController@rph_pdf');

