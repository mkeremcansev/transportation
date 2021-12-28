<?php

use App\Http\Controllers\web\auth\LoginController;
use App\Http\Controllers\web\auth\LogoutController;
use App\Http\Controllers\web\auth\PasswordChangeController;
use App\Http\Controllers\web\auth\ProfilePathChangeController;
use App\Http\Controllers\web\auth\RegisterController;
use App\Http\Controllers\web\auth\ResetPasswordController;
use App\Http\Controllers\web\auth\VerifyEmailController;
use App\Http\Controllers\web\TopicController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
*/

Route::view('/email/verify', 'vendor.notifications.unverified')->middleware(['auth', 'verify.true'])->name('verification.notice');
Route::get('/email/verify/{id}/{hash}', [VerifyEmailController::class, 'verify'])->middleware(['auth', 'signed'])->name('verification.verify');
Route::get('/email/verification-notification', [VerifyEmailController::class, 'send'])->middleware(['auth', 'throttle:6,1'])->name('verification.send');
Route::middleware(['guest', 'throttle:6,1'])->group(function () {
    Route::view('/forgot-password', 'vendor.notifications.password.forgot')->name('password.request');
    Route::post('/forgot-password', [ResetPasswordController::class, 'send'])->name('password.email');
    Route::get('/reset-password/{token}', [ResetPasswordController::class, 'callback'])->name('password.reset');
    Route::post('/reset-password', [ResetPasswordController::class, 'reset'])->name('password.update');
});
Route::name('web.')->group(function () {
    Route::view('/', 'web.homepage.index')->name('index');
    Route::view('/about-us', 'web.about.index')->name('about-us.index');
    Route::view('/faq', 'web.faq.index')->name('faq.index');
    Route::view('/contact', 'web.contact.index')->name('contact.index');
    Route::post('/topic/create/location', [TopicController::class, 'location'])->name('topic.location.store');
});
Route::name('web.')->middleware('login.true')->group(function () {
    Route::view('/login', 'web.login.index')->name('login.index');
    Route::post('/login', [LoginController::class, 'store'])->name('login.store');
    Route::view('/register', 'web.register.index')->name('register.index');
    Route::post('/register/institutional', [RegisterController::class, 'institutional'])->name('register.institutional');
    Route::post('/register/individual', [RegisterController::class, 'individual'])->name('register.individual');
});
Route::name('web.')->middleware(['auth', 'verified', 'role:admin|moderator|institutional'])->group(function () {
    Route::view('/topic/create', 'web.topic.create.index')->name('topic.index');
    Route::post('/topic/store', [TopicController::class, 'store'])->name('topic.store');
});
Route::name('web.')->middleware(['auth', 'verified', 'role:admin|moderator|institutional|individual'])->group(function () {
    Route::view('/topics', 'web.topics.index');
    Route::get('/topic/{slug}', [TopicController::class, 'show'])->name('topic.show');
    Route::post('/user/password/change', [PasswordChangeController::class, 'update'])->name('password.change.update');
    Route::post('user/profile_path/change', [ProfilePathChangeController::class, 'update'])->name('profile_path.change.update');
    Route::view('/account', 'web.account.index')->name('account.index');
});
Route::name('web.')->middleware('auth')->group(function () {
    Route::get('/logout', [LogoutController::class, 'store'])->name('logout.store');
});
