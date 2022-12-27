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
Route::prefix('dashboard')->name('dashboard')->group(function (){
    Route::controller('ArticaleController')->prefix('/articales')->name('.articales')->group(function (){
      Route::match(['get','post','put','delete'],'/{id?}','index')->name('.index');
    });
});


