<?php

use App\Http\Controllers\API\AccountsController;
use App\Http\Controllers\API\ExpenseController;
use App\Http\Controllers\API\UserController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

// Route::get('/user', function (Request $request) {
//     return $request->user();
// })->middleware('auth:sanctum');
Route::controller(UserController::class)->group(function(){
    Route::post('/user/store', 'store');
});
Route::controller(AccountsController::class)->group(function () {
    Route::post('/account/store','store');
    Route::post('/account/create','create');
});
Route::controller(ExpenseController::class)->group(function () {
    Route::post('/expense/store', 'store');
});
