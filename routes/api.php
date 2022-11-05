<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::group(['middleware'=>'auth:api'],function(){
    //User API
    Route::get('users','UserController@index');
    Route::post('user/{id}/delete','UserController@delete');
    Route::get('user/{id}/edit','UserController@edit');
    Route::post('user','UserController@store');

    //Company API
    Route::get('companies','CompanyController@index');
    Route::post('company/{id}/delete','CompanyController@delete');
    Route::get('company/{id}/edit','CompanyController@edit');
    Route::post('company','CompanyController@store');
});
