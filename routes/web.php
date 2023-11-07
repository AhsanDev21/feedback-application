<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Back\LoginController;
use App\Http\Controllers\Back\DashboardController;
use App\Http\Controllers\Back\FeedbackController as AdminFeedbackController;
use App\Http\Controllers\Back\CommentController as AdminCommentController;
use App\Http\Controllers\Auth\AuthenticatedSessionController;
use App\Http\Controllers\Front\UserController as FrontUserController;
use App\Http\Controllers\Back\UserController as UserController;
use App\Http\Controllers\Front\FeedbackController as FeedbackController;
use App\Http\Controllers\Front\CommentController as CommentController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/


Route::get('/', [AuthenticatedSessionController::class, 'create']);


Route::group(['as' => 'back.', 'prefix' => 'admin'], function () {
    Route::get('/login', [LoginController::class, 'login'])->name('login');
    Route::post('/login', [LoginController::class, 'loginPost'])->name('login_post');
    Route::post('/logout', [LoginController::class, 'logoutPost'])->name('logoutPost');
    Route::middleware('auth')->group(function () {
        Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

        /**User List*/
        Route::get('/users/list', [UserController::class, 'index'])->name('user_list');
        Route::delete('/users/destroy', [UserController::class, 'destroy'])->name('user_delete');

        /**Feedback List*/
        Route::get('/feedback/list', [AdminFeedbackController::class, 'index'])->name('feedback_list');
        Route::delete('/feedback/{feedback}', [AdminFeedbackController::class, 'destroy'])->name('feedback_destroy');

        /**Comment List*/
        Route::get('/comment/list', [AdminCommentController::class, 'index'])->name('comment_list');
        Route::post('/comments/{comment}/toggle', [AdminCommentController::class, 'toggle'])->name('comments_toggle');
        Route::delete('/comments/{comment}', [AdminCommentController::class, 'destroy'])->name('comments_destroy');

    });



});
Route::middleware(['auth', 'verified'])->group( function () {
    Route::get('/dashboard', [FrontUserController::class, 'index'])->name('dashboard');
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    /**Feedback Front*/
    Route::get('/feedback', [FeedbackController::class, 'index'])->name('feedback.index');
    Route::get('/feedback/create', [FeedbackController::class, 'create'])->name('feedback.create');
    Route::post('/feedback', [FeedbackController::class, 'store'])->name('feedback.store');
    Route::post('/feedback/vote/{id}', [FeedbackController::class, 'vote'])->name('feedback.vote');

    /**Comment Front*/
    Route::get('/comments/create/{feedback}', [CommentController::class, 'create'])->name('comments.create');
    Route::post('/comments', [CommentController::class, 'store'])->name('comments.store');

});

require __DIR__.'/auth.php';
