<?php

use Database\Seeders\FilmSeeder;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\FilmController;
use App\Http\Controllers\PermissionController;





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
Route::post('login', [AuthController::class, 'login']);

Route::prefix('films')->middleware('auth')->group(function () {
    Route::group(['prefix' => 'customers', 'middleware' => ['auth']], function ($router) {
        Route::post('create', [CustomerController::class, 'customerCreate']);
        Route::post('update/{id}', [CustomerController::class, 'customerUpdate']);
        Route::put('delete/{id}', [CustomerController::class, 'customerDelete']);
      
    });

    Route::group(['prefix' => 'films', 'middleware' => ['role:admin']], function ($router) {
        Route::post('create', [FilmController::class, 'filmCreate']);
        Route::post('update/{id}', [FilmController::class, 'filmUpdate']);
        Route::delete('delete/{id}', [FilmController::class, 'filmDelete']);
    });
    Route::middleware('role:visit|admin')->group(function () {
        Route::get('list', [FilmController::class, 'filmList']);
        Route::get('info/{id}', [FilmController::class, 'filmInfo']);
    });
});
