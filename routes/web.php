<?php
/* 
 * Author
 * Ratno Firmansyah <asturof11@gmail.com>
 */

use Illuminate\Support\Facades\Route;

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