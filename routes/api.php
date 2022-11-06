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

/*Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});*/
Route::post('login','LoginController@login');

Route::group(['middleware'=>'auth:api'],function(){
    //User API
    Route::get('users','UserController@index');
    Route::post('delete-user','UserController@delete');
    Route::post('user/{id}/edit','UserController@update');
    Route::get('user/{id}','UserController@show');
    Route::post('user','UserController@store');

    //Company API
    Route::get('companies','CompanyController@index');
    Route::post('delete-company','CompanyController@delete');
    Route::post('company/{id}/edit','CompanyController@update');
    Route::post('company','CompanyController@store');
    Route::get('company/{id}','CompanyController@show');
    Route::get('get-users','CompanyController@getAllUsers');
    Route::post('update-company-users','CompanyController@updateUsersToCompany');


});
