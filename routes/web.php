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
Route::get('/order/{code}', [MainController::class, 'order']);
Route::get('/checkout', [MainController::class, 'checkout']);
Route::prefix('backoffice')->group(function () {
  Route::get('/', [BackOfficeController::class, 'index']);
  Route::prefix('my-events')->group(function () {
    Route::get('/', [BackOfficeController::class, 'myEvents']);
    Route::get('/form', [BackOfficeController::class, 'myEventsForm']);
  });
});
