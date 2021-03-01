<?php

use App\Http\Controllers\AdminDashboardController;
use App\Http\Controllers\BaseUserController;
use Illuminate\Support\Facades\Auth;
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

Route::group(['middleware'=>'auth'],function (){
    Route::get('/',[AdminDashboardController::class,'index'])->name('dashboard');
    Route::post('/logout',[BaseUserController::class,'logoutUser'])->name('logout');
});

Route::get('/login',[BaseUserController::class,'LoginPageShow'])->name('login');
Route::post('/login-check',[BaseUserController::class,'userLoginCheck'])->name('login-check');



