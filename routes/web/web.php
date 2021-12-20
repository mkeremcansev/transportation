<?php

use App\Http\Controllers\web\auth\LoginController;
use App\Http\Controllers\web\TopicController;
use Illuminate\Support\Facades\Route;

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

Route::name('web.')->group(function () {
    Route::view('/', 'web.homepage.index')->name('index');
    Route::view('/login', 'web.login.index')->name('login.index');
    Route::post('/login', [LoginController::class, 'store'])->name('login.store');
    Route::view('/register', 'web.register.index')->name('register.index');
    Route::view('/about-us', 'web.about.index')->name('about-us.index');
    Route::view('/faq', 'web.faq.index')->name('faq.index');
    Route::view('/contact', 'web.contact.index')->name('contact.index');
});
// Route::name('web.')->middleware('role:admin|individual|institutional')->group(function () {
//     Route::view('/topics', 'web.topics.index');
//     Route::get('/topic/{slug}', [TopicController::class, 'show'])->name('topic.show');
// });
Route::name('web.')->group(function () {
    Route::view('/topics', 'web.topics.index');
    Route::view('/topic/create', 'web.topic.create.index');
    Route::get('/topic/{slug}', [TopicController::class, 'show'])->name('topic.show');
    Route::post('/topic/create/location', [TopicController::class, 'location'])->name('topic.location.store');
    Route::post('/topic/store', [TopicController::class, 'store'])->name('topic.store');
});
Route::view('/account', 'web.account.index');
