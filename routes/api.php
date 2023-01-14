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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
Route::get('/get-commands/{id}','\App\Http\Controllers\ApiController@api_get_commands')->name('get-commands');
Route::get('/get-setup/{hwid}','\App\Http\Controllers\ApiController@api_get_setup')->name('get-setup');
Route::post('/post-setup','\App\Http\Controllers\ApiController@api_post_setup')->name('post-setup');
Route::get('/update-cmd-status/{id}','\App\Http\Controllers\ApiController@update_cmd_status')->name('update-cmd-status');