<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProcessController;
use App\Http\Controllers\PaymentController;
use App\Http\Controllers\StripeController;
use App\Http\Controllers\DashboardController;
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


Route::get('/', [HomeController::class, 'index']);
Route::get('/about', [HomeController::class, 'about']);

Route::get('/test', [ProcessController::class, 'test']);

Route::get('/go_search', [ProcessController::class, 'general_search_2']);
Route::get('/login', [ProcessController::class, 'indexlogin']);
Route::get('/logout', [ProcessController::class, 'indexlogout']);
Route::get('/home', [ProcessController::class, 'homepage']);
Route::get('/register_tutor', [ProcessController::class, 'register_tutor'])->middleware(['auth', 'Istutor']);
Route::post('/register_tutor', [ProcessController::class, 'store']);
Route::get('/store', [ProcessController::class, 'store']);   
Route::post('/view', [ProcessController::class, 'destroy']);
Route::get('/view', [ProcessController::class, 'index']);
Route::get('/search', [ProcessController::class, 'show']);
Route::get('/general_search', [ProcessController::class, 'general_search']);
Route::get('/edit/{id}', [ProcessController::class, 'edit']);

Route::get('/paypal', [PaymentController::class, 'index']);
Route::post('/paypal', [PaymentController::class, 'payWithpaypal']);
Route::get('/status', [PaymentController::class, 'getPaymentStatus']);
Route::get('/payment_select/{price}/{name}/{path}', [PaymentController::class, 'payment_select'])->middleware('auth');

Route::get('/payment_select1/{price}/{name}', [PaymentController::class, 'payment_selection']);

Route::get('/stripe', [StripeController::class, 'index']);
Route::post('/stripe', [StripeController::class, 'stripePost']);


Route::get('/schedule', [ProcessController::class, 'schedule']);
Route::post('/save_tutor', [ProcessController::class, 'store']);

Route::get('/timetable', [ProcessController::class, 'show_schedule']);


// Dashbaord

Route::prefix('dashboard')->group(function () {
    Route::get('/', [DashboardController::class, 'index'])->middleware('auth');
    Route::get('/calendar', [DashboardController::class, 'calendar'])->name('tutor_calendar');
    // Route::post('/schedule_save', [DashboardController::class, 'schedule_save'] )->name('schedule');
});


Route::get('/storage/{extra}', function ($extra) {
return redirect('/public/storage/$extra');
}
)->where('extra', '.*');


Auth::routes();
