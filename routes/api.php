<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\AuthorController;
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

Route::controller(AuthController::class)->group(function ()
{
    Route::post('auth/register', 'register');
    Route::post('auth/login', 'login');
    Route::post('auth/logout', 'logout');
    Route::post('auth/refresh', 'refresh');
});

Route::controller(AuthorController::class)->group(function ()
{
    Route::get('author', 'index');
    Route::get('author/{id}', 'show');
    Route::post('author', 'create');
    Route::put('author', 'update');
    Route::delete('author/{id}', 'delete');
});
