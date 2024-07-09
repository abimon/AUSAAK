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
use App\Http\Controllers\AKUploadController;
use App\Http\Controllers\ArticleReactionController;
use App\Http\Controllers\BibleVersesKjvController;
use App\Http\Controllers\BorrowController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\InventoryController;
use App\Http\Controllers\MissionApplicationController;
use App\Http\Controllers\MissionController;
use App\Http\Controllers\MissionFileController;
use App\Http\Controllers\MissionRegistrationController;
use App\Http\Controllers\MissionSitesController;
use App\Http\Controllers\ReportController;
use App\Http\Controllers\SMSController;
use App\Http\Controllers\TicketController;
use App\Http\Controllers\UserController;
use App\Http\Middleware\RegUser;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Route::controller(HomeController::class)->group(function () {
    Route::get("/", "index");
 });
Route::get('/mission/apply', function () {
    return redirect()->route('m_application.create');
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
        'event'=>AKEventController::class,
        'react'=>ArticleReactionController::class,
        'upload'=>AKUploadController::class,
        // User
        'user' => UserController::class,
        // Leadership
        'report'=>ReportController::class,
        'role'=>AKRoleController::class,
        'leader'=>AKLeaderController::class,
        'repository'=>AKReportController::class,
        // Mission
        'mission'=>MissionController::class,
        'm_registration'=>MissionRegistrationController::class,
        'm_sites'=>MissionSitesController::class,
        'm_files'=>MissionFileController::class,
        // Dev
        'ticket'=>TicketController::class,

        //Communication
        'inventory'=>InventoryController::class,
        'borrow'=>BorrowController::class,
        'message'=>SMSController::class,

    ]);
    Route::get('/step-two', function () {
        return view('step-two');
    });
    Route::get('/dashboard', [HomeController::class,'dashboard'])->middleware(RegUser::class);
});
Route::resources([
    'm_application'=>MissionApplicationController::class,
    'bible'=>BibleVersesKjvController::class,
    'article'=>AKArticleController::class,
]);
