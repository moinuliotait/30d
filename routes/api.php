<?php

use App\Http\Controllers\BaseUserController;
use App\Http\Controllers\ContentCategoryController;
use App\Http\Controllers\ContentTypeController;
use App\Http\Controllers\MetalPriceConverterController;
use App\Http\Controllers\NamazDataFormationController;
use App\Http\Controllers\ZakatCalculatorController;
use App\Http\Controllers\ContentController;
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

//Route::middleware('auth:api')->get('/user', function (Request $request) {
//    return $request->user();
//});

Route::get('/prayer-time/specific-day', [NamazDataFormationController::class, 'prayerTimeForSpecificDay']);
Route::get('/monthly-event', [NamazDataFormationController::class, 'eachMonthAllEventList']);
Route::get('/metal-price-update', [MetalPriceConverterController::class, 'saveMetalCurrentPriceIntoDB']);
Route::post('/total-neshab-amount', [ZakatCalculatorController::class, 'zakatCalculation']);
Route::post('/register', [BaseUserController::class, 'register']);
Route::post('/content-type', [ContentTypeController::class, 'insert']);
Route::post('/content-category', [ContentCategoryController::class, 'insert']);

Route::get('content', [ContentController::class, 'getContentByType']);
