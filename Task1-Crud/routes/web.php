<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\ArticaleController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\ProductController;
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
Route::get('/',[ArticaleController::class,'index'])->name('articale.index');

Route::middleware('notguest')->controller(LoginController::class)->group(function(){
    Route::get('/login','login')->name('login');
    Route::post('/loginRequest','loginRequest')->name('loginRequest');
});

Route::middleware('login','roleAuth')->group(function(){
Route::controller(ArticaleController::class)->prefix('articale/')->name('articale.')->group(function(){
    Route::get('create','create')->name('create');
    Route::post('store','store')->name('store');
    Route::get('{articale}/edit','edit')->name('edit');
    Route::put('{articale}/update','update')->name('update');
    Route::delete('{articale}/destroy','destroy')->name('destroy');
});
Route::get('category/index',[CategoryController::class,'index'])->name('category.index');

Route::controller(CategoryController::class)->prefix('category/')->name('category.')->group(function(){
    Route::get('create','create')->name('create');
    Route::post('store','store')->name('store');
    Route::get('{category}/edit','edit')->name('edit');
    Route::put('{category}/update','update')->name('update');
    Route::delete('{category}/destroy','destroy')->name('destroy');
});
Route::controller(ProductController::class)->prefix('product/')->name('product.')->group(function(){
    Route::get('create','create')->name('create');
    Route::post('store','store')->name('store');
    Route::get('{product}/edit','edit')->name('edit');
    Route::put('{product}/update','update')->name('update');
    Route::delete('{product}/destroy','destroy')->name('destroy');
    Route::get('index','index')->name('index');

});
});
Route::get('/logout',[AdminController::class,'logout'])->name('logout')->middleware('login');
