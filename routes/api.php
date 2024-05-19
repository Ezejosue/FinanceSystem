<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\IncomeController;
use App\Http\Controllers\BalanceController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\ExpenseController;


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
   
Route::post('/login', [AuthController::class, 'login']);
Route::post('/register', [AuthController::class, 'register']);

Route::post('/income', [IncomeController::class, 'store']);
Route::get('/income/{userId}', [IncomeController::class, 'show']);
Route::put('/income/{id}', [IncomeController::class, 'update']);
Route::delete('/income/{id}', [IncomeController::class, 'destroy']);  
Route::get('/balance/{userId}', [BalanceController::class, 'show']);  
Route::post('/expense', [ExpenseController::class, 'store']);
Route::get('/expense/{userId}', [ExpenseController::class, 'show']);
Route::put('/expense/{id}', [ExpenseController::class, 'update']);
Route::delete('/expense/{id}', [ExpenseController::class, 'destroy']);
  
Route::middleware('auth:sanctum')->group(function () {
 

});


