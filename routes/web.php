<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MainController;
use App\Http\Controllers\BackOfficeController;
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

Route::get('/', [MainController::class, 'index']);
Route::get('/event/{id}', [MainController::class, 'event']);
Route::get('/promotion/{id}', [MainController::class, 'promotion']);
Route::get('/event', [MainController::class, 'events']);
Route::get('/promotion', [MainController::class, 'promotions']);
Route::get('/order/{code}', [MainController::class, 'order']);
Route::get('/category/{category?}', [MainController::class, 'category']);
Route::get('/search/{search?}', [MainController::class, 'search']);
Route::get('/checkout', [MainController::class, 'checkout']);
Route::get('/login', [MainController::class, 'login']);
Route::get('/email', [MainController::class, 'email']);
$subject = ['audience','promotor','backoffice'];
foreach($subject as $prefix) {
  Route::prefix($prefix)->group(function () {
    Route::get('/', [BackOfficeController::class, 'index']);
    Route::get('/banner', [BackOfficeController::class, 'banner']);
    Route::get('/category', [BackOfficeController::class, 'category']);
    Route::get('/users', [BackOfficeController::class, 'users']);
    Route::prefix('my-events')->group(function () {
      Route::get('/', [BackOfficeController::class, 'myEvents']);
      Route::get('/form', [BackOfficeController::class, 'myEventsForm']);
      Route::get('/form/{id?}', [BackOfficeController::class, 'myEventsForm']);
    });
    Route::get('/pos', [BackOfficeController::class, 'pos']);
    Route::get('/pos/checkout', [BackOfficeController::class, 'posCheckout']);
    Route::get('/pos/order/{code}', [BackOfficeController::class, 'posOrder']);
    Route::get('/promotion-and-voucher', [BackOfficeController::class, 'promotion_and_voucher']);
    Route::get('/promotion-and-voucher/form', [BackOfficeController::class, 'promotion_and_voucher_form']);
    Route::get('/promotion-and-voucher/form/{id?}', [BackOfficeController::class, 'promotion_and_voucher_form']);
    Route::get('/withdraw', [BackOfficeController::class, 'withdraw']);
    Route::get('/report', [BackOfficeController::class, 'report']);
    Route::get('/custom-form', [BackOfficeController::class, 'custom_form']);
    Route::get('/profile', [BackOfficeController::class, 'profile']);
    Route::get('/legal-information', [BackOfficeController::class, 'legalInformation']);
    Route::get('/bank-account', [BackOfficeController::class, 'bankAccount']);
    Route::get('/password', [BackOfficeController::class, 'password']);
    Route::get('/order-data', [BackOfficeController::class, 'orderData']);
    Route::get('/explore', [BackOfficeController::class, 'explore']);
    Route::get('/referral-and-commission', [BackOfficeController::class, 'referral']);
    Route::get('/my-tickets', [BackOfficeController::class, 'myTickets']);
    Route::get('/my-tickets/details', [BackOfficeController::class, 'myTicketDetails']);
  });
}
