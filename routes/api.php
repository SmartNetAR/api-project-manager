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
    Route::get(  'team', 'TeamController@index' ) ;
    Route::get(  'team/{id}', 'TeamController@show' )->where('id', '[0-9]+') ;
    Route::get(  'team/{name}', 'TeamController@showByName' )->where('name', '[A-Za-z_-]+') ;
    Route::post( 'team', 'TeamController@store' ) ;
    Route::get(  'team/join/{id}', 'TeamController@join' ) ;
    /* project */
    Route::get(  'project', 'ProjectController@index' ) ;
    Route::get(  'project/{id}', 'ProjectController@show' ) ;
    Route::post( 'project', 'ProjectController@store' ) ;
    Route::post(  'project/join/{id}', 'ProjectController@join' ) ;
    /* roles */
        /* team */
    Route::get( 'teamrole', 'TeamRoleController@index' ) ;

    Route::get( 'projectrole', 'RoleController@index' ) ;
    /* user */
    Route::get( 'user/roles', 'TeamRoleController@roles' ) ;
    // Route::get('user/{id}', 'TeamController@show');
});