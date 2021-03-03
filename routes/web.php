<?php

use App\Http\Controllers\AdminDashboardController;
use App\Http\Controllers\BaseUserController;
use App\Http\Controllers\EducativeController;
use App\Http\Controllers\LifeStyleContentController;
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

Route::group(['middleware' => 'auth'], function () {
    Route::get('/', [AdminDashboardController::class, 'index'])->name('dashboard');
    Route::post('/logout', [BaseUserController::class, 'logoutUser'])->name('logout');
    Route::prefix('life-style')->group(function () {
        Route::get('/', [LifeStyleContentController::class, 'index'])->name('life-style');
        Route::get('/lifeStyle-create-page', [LifeStyleContentController::class, 'lifeStyleCreatePageShow'])->name('life-style-create-page');
        Route::post('/create-life-style', [LifeStyleContentController::class, 'createLifeStyle'])->name('create-life-style');
        Route::get('/edit-life-style/show/{id}', [LifeStyleContentController::class, 'editLifeStyleContent'])->name('edit-page-show-life-style');
        Route::put('/update-life-style', [LifeStyleContentController::class, 'updateLifeStyleContent'])->name('life-style-update');
        Route::get('/content/{name}', [LifeStyleContentController::class, 'lifeStyleSportsItem'])->name('specific-content');
    });
    Route::delete('/content/delete/{id}', [LifeStyleContentController::class, 'deleteContent'])->name('delete-content');

    //Educative route
    Route::group(['as' => 'educatie', 'prefix' => 'educatie'], function () {
        Route::get('/', [EducativeController::class, 'index']);
        Route::get('create', [EducativeController::class, 'create'])->name('.create');
        Route::post('store', [EducativeController::class, 'store'])->name('.store');
        Route::get('edit/{id}', [EducativeController::class, 'edit'])->name('.edit');
        Route::put('update', [EducativeController::class, 'update'])->name('.update');
        Route::delete('delete/{id}', [EducativeController::class, 'delete'])->name('.delete');
    });
});

Route::get('/login', [BaseUserController::class, 'LoginPageShow'])->name('login');
Route::post('/login-check', [BaseUserController::class, 'userLoginCheck'])->name('login-check');
