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

/*Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});*/
Route::get('/clients', 'ClientController@Read');
Route::get('/services', 'ServiceController@Read');
Route::get('/appications', 'IndexController@Read');

Route::post('/clients', 'ClientController@Add');
Route::post('/services', 'ServiceController@Add');
Route::post('/appications', 'IndexController@Add');

Route::put('/clients/{id}', 'ClientController@Update');
Route::put('/services/{id}', 'ServiceController@Update');
Route::put('/appications/{id}', 'IndexController@Update');

Route::delete('/clients/{id}', 'ClientController@Delete');
Route::delete('/services/{id}', 'ServiceController@Delete');
Route::delete('/appications/{id}', 'IndexController@Delete');

