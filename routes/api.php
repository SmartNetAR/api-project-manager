<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::post('register', 'AuthController@register');
Route::post('login', 'AuthController@login');

Route::group(['middleware' => 'auth:api'], function () {
    Route::get('profile', 'AuthController@profile');
    /* team */
    Route::get(  'team/{id}', 'TeamController@show' );
    Route::post( 'team', 'TeamController@store' );
    Route::get(  'team/join/{id}', 'TeamController@join' );
    
    /* user */
    // Route::get('user/{id}', 'TeamController@show');
});