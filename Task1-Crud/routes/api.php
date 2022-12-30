<?php
use \App\Http\Controllers\Api\ArticaleController;
use Illuminate\Support\Facades\Route;
/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API ro  utes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/
Route::post('login',[\App\Http\Controllers\Api\AuthController::class,'login']);
Route::middleware('auth:sanctum')->prefix('dashboard')->name('dashboard')->group(function (){
    Route::controller('ArticaleController')->prefix('/articales')->name('.articales')->group(function (){
      Route::match(['get','delete'],'/{id?}','index')->name('.index');
      Route::put('/update/{id}','update')->name('update');
      Route::post('/store','store')->name('.store');
    });
});



