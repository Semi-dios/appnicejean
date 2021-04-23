<?php

use Illuminate\Http\Request;
use Illuminate\Routing\Router;
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


Route::post('login', 'Api\AuthController@login');
Route::post('register', 'Api\AuthController@registers');

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});



Route::middleware(['auth:api'])->group(function () {
    Route::get('user-info', 'Api\AuthController@user');
    Route::post('logout','Api\AuthController@logout');
});
