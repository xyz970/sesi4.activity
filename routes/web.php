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
    return view('welcome');
});

Route::get('login',[\App\Http\Controllers\Auth\loginController::class,'loginPage']);
Route::group(['prefix'=>'auth','as'=>'auth.'],function(){
    Route::post('login_process',[\App\Http\Controllers\Auth\loginController::class,'login'])->name('login_process');
});

/**
 * Keterngan userType
 * // 1 => Admin, 2 => Manager, 0 => User
 */
Route::get('admin/home',function (){
    return 'Admin Home';
})->name('admin.home')->middleware(['auth','user-access:1']);

Route::get('manager/home',function (){
    return 'Manager Home';
})->name('manager.home')->middleware(['auth','user-access:2']);

Route::get('home',function (){
    return 'User';
})->name('home')->middleware(['auth','user-access:0']);
