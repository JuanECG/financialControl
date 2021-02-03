<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\FinancesController;
use App\Http\Controllers\HomeController;

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

Route::get('/',[HomeController::class, 'getHome']);



Route::group(['middleware' => 'auth'], function(){
    Route::get('transfer', [FinancesController::class, 'getIndex']);
    Route::get('stats', [FinancesController::class, 'getStatistics']);
    Route::get('me', [FinancesController::class, 'getAccount']);

});



require __DIR__.'/auth.php';
