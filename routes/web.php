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

Route::get('/', function () {
    return view('welcome');
});

$router->group(['prefix' => 'user'], function () use ($router) {
    Route::get('/', 'App\Http\Controllers\UserController@index');
    Route::get('/create', 'App\Http\Controllers\UserController@create');
    Route::post('/', 'App\Http\Controllers\UserController@store');
    Route::get('/{id}', 'App\Http\Controllers\UserController@edit');
    
    Route::put('/{id}', 'App\Http\Controllers\UserController@update');
    Route::delete('/{id}', 'App\Http\Controllers\UserController@destroy');
});