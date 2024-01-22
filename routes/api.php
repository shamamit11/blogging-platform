<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::group(['middleware' => 'api'], function () {
    // Authentication
    Route::post('register', 'AuthController@register');
    Route::post('login', 'AuthController@login');

    Route::group(['middleware' => 'auth.jwt'], function () {
        // Blog Posts
        Route::get('posts', 'BlogPostController@index');
        Route::get('posts/{id}', 'BlogPostController@show');
        Route::post('posts', 'BlogPostController@store');
        Route::put('posts/{id}', 'BlogPostController@update');
        Route::delete('posts/{id}', 'BlogPostController@destroy');
    });
});

