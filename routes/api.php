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


Route::resource('/','TestApiController');

Route::get('/{id}','TestApiController@show');
Route::put('/{id}','TestApiController@update');
Route::patch('/{id}','TestApiController@update');
Route::delete('/{id}','TestApiController@destroy');
Route::fallback(function(){
    return response()->json(['status code'=> 404,'message' => 'Page Not Found. ahihi'], 404);
});
// Route::put('/{id}/update','TestApiController@update');
