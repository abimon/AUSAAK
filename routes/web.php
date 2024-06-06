<?php

use App\Http\Controllers\AKAccountController;
use App\Http\Controllers\AKArticleController;
use App\Http\Controllers\AKChatController;
use App\Http\Controllers\AKEventController;
use App\Http\Controllers\AKExpenseController;
use App\Http\Controllers\AKLeaderController;
use App\Http\Controllers\AKNotificationController;
use App\Http\Controllers\AKReporistoryController;
use App\Http\Controllers\AKReportController;
use App\Http\Controllers\AKRoleController;
use App\Http\Controllers\AKTransactionController;
use App\Http\Controllers\ArticleReactionController;
use App\Http\Controllers\MissionApplicationController;
use App\Http\Controllers\MissionController;
use App\Http\Controllers\MissionFileController;
use App\Http\Controllers\MissionRegistrationController;
use App\Http\Controllers\MissionSitesController;
use App\Http\Controllers\TicketController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return redirect('/dashboard');
});

Auth::routes();

Route::get('/home', function () {
    return redirect('/dashboard');
})->name('home');
Route::middleware('auth')->group(function () {
    Route::resources([
        // Finance
        'account'=>AKAccountController::class,
        'transaction'=>AKTransactionController::class,
        'expense'=>AKExpenseController::class,
        // Social
        'notification'=>AKNotificationController::class,
        'chat' => AKChatController::class,
        'article'=>AKArticleController::class,
        'event'=>AKEventController::class,
        'react'=>ArticleReactionController::class,
        // User
        'user' => UserController::class,
        // Leadership
        'report'=>AKReportController::class,
        'role'=>AKRoleController::class,
        'leader'=>AKLeaderController::class,
        'repository'=>AKReporistoryController::class,
        // Mission
        'mission'=>MissionController::class,
        'm_registration'=>MissionRegistrationController::class,
        'm_sites'=>MissionSitesController::class,
        'm_files'=>MissionFileController::class,
        // Dev
        'ticket'=>TicketController::class,

    ]);
    Route::get('/dashboard', function () {
        if (Auth()->user()->chapter == null) {
            return view('step-two');
        }
        return view('dashboard.index');
    });
});
Route::resources([
    'm_application'=>MissionApplicationController::class,
]);
