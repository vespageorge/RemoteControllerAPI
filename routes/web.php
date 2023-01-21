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
    return view('login');
});

Route::middleware(['auth:sanctum', 'verified'])
	->get('/dashboard', "\App\Http\Controllers\Controller@index")
	->name('dashboard');


Route::middleware(['auth:sanctum', 'verified'])
	->get('/create-btn', "\App\Http\Controllers\Controller@configurator")
	->name('create-btn');

Route::get('/exec_command/{id_cmd}/{id_setup}', '\App\Http\Controllers\Controller@command')->name('command');

Route::get('/ss', function () {
    return view('show-ss');
})->name('ss');