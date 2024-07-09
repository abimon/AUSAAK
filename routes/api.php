<?php

use App\Http\Controllers\API\AccountController;
use App\Http\Controllers\API\ArticleController;
use App\Http\Controllers\API\BorrowController;
use App\Http\Controllers\API\Invemtory;
use App\Http\Controllers\API\TransactionController;
use App\Http\Controllers\API\UserController;
use Illuminate\Support\Facades\Route;


// User Routes
Route::prefix('/user')->controller(UserController::class)->group(function () {
    Route::get('/', 'index');
    Route::post('/login', 'create');
    Route::post('/register', 'store');
    Route::put('/update/{id}', 'update')->middleware('auth:sanctum');
    Route::delete('/destroy/{id}', 'destroy')->middleware('auth:sanctum');
});
// Route::middleware('auth:sanctum')->group(function () {
    // Articles Routes
    Route::prefix('/article')->controller(ArticleController::class)->group(function () {
        Route::get('/', 'index');
        Route::get('/show/{id}', 'show');
        Route::post('/create', 'store');
        Route::put('/update/{id}', 'update');
        Route::delete('/destroy/{id}', 'destroy');
    });
    // Transactions Routes
    Route::prefix('/transactions')->controller(TransactionController::class)->group(function () {
        Route::get('/', 'index'); //get all transactions on the latest account.
        Route::get('/show/{id}', 'show'); //User transactions
        Route::get('/get/{account_id}', 'get'); //all transactions in specific account
        Route::get('/get/{account_id}/{user_id}', 'contributions'); //all transactions of a specific member on specific account
        Route::post('/create', 'store'); //create a transaction
        Route::put('/update/{id}', 'update'); //update transaction
        Route::delete('/destroy/{id}', 'destroy'); //delete transaction
    });
    // Accounts Routes
    Route::prefix('/accounts')->controller(AccountController::class)->group(function () {
        Route::get('/', 'index');
        Route::get('/show/{id}', 'show');
        Route::post('/create', 'store');
        Route::put('/update/{id}', 'update');
        Route::delete('/destroy/{id}', 'destroy');
    });
    // Inventory
    Route::prefix('/inventory')->controller(Invemtory::class)->group(function () {
        Route::get('/', 'index');
        Route::get('/show/{id}', 'show');
        Route::post('/create', 'store');
        Route::put('/update/{id}', 'update');
        Route::delete('/destroy/{id}', 'destroy');
    });
    // Borrowing
    Route::prefix('/borrowings')->controller(BorrowController::class)->group(function () {
        Route::get('/', 'index');
        Route::get('/show/{id}', 'show');
        Route::post('/create', 'store');
        Route::put('/update/{id}', 'update');
        Route::delete('/destroy/{id}', 'destroy');
    });
// });
