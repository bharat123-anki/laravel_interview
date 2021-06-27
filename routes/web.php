<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PatternController;
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
	// echo "string";
    return view('welcome');
});
Route::get('/starPattern', [PatternController::class, 'starPattern'])->name('/starPattern');
Route::get('/nestedPattern', [PatternController::class, 'nestedPattern'])->name('/nestedPattern');
Route::get('/factorialNumber', [PatternController::class, 'factorialNumber'])->name('/factorialNumber');
Route::get('/chessBoardPattern', [PatternController::class, 'chessBoardPattern'])->name('/chessBoardPattern');



