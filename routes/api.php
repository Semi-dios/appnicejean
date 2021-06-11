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


Route::post('auth/login', 'Api\AuthController@login');
Route::post('auth/register', 'Api\AuthController@register');
Route::resource('roles', 'Api\RoleController');




Route::middleware(['auth:sanctum'])->group(function () {

    Route::resource('users', 'Api\UserController');
    Route::resource('products', 'Api\ProductController');
    Route::get('user-info', 'Api\AuthController@user');
    Route::post('logout','Api\AuthController@logout');
});
