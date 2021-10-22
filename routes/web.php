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

//vista principal
Route::get('/', function () {
    return view('welcome');
});

//vista creditos
Route::get('/creditos', function () {
    return view('creditos');
})->name('creditos');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/clasificar', 'HomeController@clasificar')->name('clasificar');



Route::get('/document/index', 'DocumentController@index')->name('document.index');
