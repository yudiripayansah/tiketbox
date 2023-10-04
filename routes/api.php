<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BannersController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\EventsController;
use App\Http\Controllers\OrdersController;
use App\Http\Controllers\UsersController;
use App\Http\Controllers\UserOrderDataController;
use App\Http\Controllers\UserLegalController;
use App\Http\Controllers\PromotionsController;
use App\Http\Controllers\TicketController;
use App\Http\Controllers\XenditController;

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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
Route::prefix('events')->group(function () {
    Route::post('/', [EventsController::class, 'read']);
    Route::post('/get', [EventsController::class, 'get']);
    Route::post('/create', [EventsController::class, 'create']);
    Route::post('/update', [EventsController::class, 'update']);
    Route::post('/delete', [EventsController::class, 'delete']);
});
Route::prefix('orders')->group(function () {
    Route::post('/', [OrdersController::class, 'read']);
    Route::post('/get', [OrdersController::class, 'get']);
    Route::post('/create', [OrdersController::class, 'create']);
    Route::post('/update', [OrdersController::class, 'update']);
    Route::post('/delete', [OrdersController::class, 'delete']);
});
Route::prefix('users')->group(function () {
    Route::post('/', [UsersController::class, 'read']);
    Route::post('/get', [UsersController::class, 'get']);
    Route::post('/create', [UsersController::class, 'create']);
    Route::post('/update', [UsersController::class, 'update']);
    Route::post('/updatePassword', [UsersController::class, 'updatePassword']);
    Route::post('/delete', [UsersController::class, 'delete']);
});
Route::prefix('userOrderData')->group(function () {
    Route::post('/', [UserOrderDataController::class, 'read']);
    Route::post('/get', [UserOrderDataController::class, 'get']);
    Route::post('/create', [UserOrderDataController::class, 'create']);
    Route::post('/update', [UserOrderDataController::class, 'update']);
    Route::post('/delete', [UserOrderDataController::class, 'delete']);
});
Route::prefix('userLegal')->group(function () {
    Route::post('/', [UserLegalController::class, 'read']);
    Route::post('/get', [UserLegalController::class, 'get']);
    Route::post('/create', [UserLegalController::class, 'create']);
    Route::post('/update', [UserLegalController::class, 'update']);
    Route::post('/delete', [UserLegalController::class, 'delete']);
});
Route::prefix('promotions')->group(function () {
    Route::post('/', [PromotionsController::class, 'read']);
    Route::post('/get', [PromotionsController::class, 'get']);
    Route::post('/create', [PromotionsController::class, 'create']);
    Route::post('/update', [PromotionsController::class, 'update']);
    Route::post('/delete', [PromotionsController::class, 'delete']);
});
Route::prefix('banners')->group(function () {
    Route::post('/', [BannersController::class, 'read']);
    Route::post('/get', [BannersController::class, 'get']);
    Route::post('/create', [BannersController::class, 'create']);
    Route::post('/update', [BannersController::class, 'update']);
    Route::post('/delete', [BannersController::class, 'delete']);
});
Route::prefix('category')->group(function () {
    Route::post('/', [CategoryController::class, 'read']);
    Route::post('/get', [CategoryController::class, 'get']);
    Route::post('/create', [CategoryController::class, 'create']);
    Route::post('/update', [CategoryController::class, 'update']);
    Route::post('/delete', [CategoryController::class, 'delete']);
});
Route::prefix('xendit')->group(function () {
    Route::post('/createVA', [XenditController::class, 'createVA']);
    Route::post('/createQR', [XenditController::class, 'createQR']);
    Route::post('/createInvoice', [XenditController::class, 'createInvoice']);
    Route::post('/callbackInvoice', [XenditController::class, 'callbackInvoice']);
});
Route::group([
    'middleware' => 'api',
    'prefix' => 'users'
], function ($router) {
    Route::post('/login', [UsersController::class, 'login']);
    Route::post('/logout', [UsersController::class, 'logout']);
});
Route::group([
    'middleware' => 'api',
    'prefix' => 'ticket'
], function ($router) {
    Route::post('/check', [TicketController::class, 'check']);
    Route::post('/detail', [TicketController::class, 'detail']);
    Route::post('/use', [TicketController::class, 'use']);
});
