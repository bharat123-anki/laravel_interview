<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TodoController;
use App\Http\Controllers\AuthController;
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

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});


// Route::middleware('auth:sanctum')->get('/user', function () {

    
// Route::get('/todo/{id}', [TodoController::class, 'getTodoById'])->name('/todo');
// });
// public routes
	Route::post('/register', [AuthController::class, 'register'])->name('/register');
	Route::post('/login', [AuthController::class, 'login'])->name('/login');
	Route::get('/getAlltodo', [TodoController::class, 'getAllTodo'])->name('/getAllTodo');
	Route::get('/todo/{id}', [TodoController::class, 'getTodoById'])->name('/todo');

// Protected Routes
Route::group(['middleware'=>['auth:sanctum']], function () {
	Route::post('/addTodo', [TodoController::class, 'addTodo'])->name('/addTodo');
	Route::put('/updateTodo/{id}', [TodoController::class, 'updateTodo'])->name('/updateTodo');
	Route::delete('/deleteTodo/{id}', [TodoController::class, 'deleteTodo'])->name('/deleteTodo');
	Route::post('/logout', [AuthController::class, 'logout'])->name('/logout');
});



Route::fallback(function(){
    return response()->json([
        'message' => 'Page Not Found. If error persists, contact info@website.com'], 404);
});