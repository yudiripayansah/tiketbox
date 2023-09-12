<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\EventsController;
use App\Http\Controllers\OrdersController;
use App\Http\Controllers\UsersController;
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
