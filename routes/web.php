<?php

use App\Http\Controllers\FrontpageController;
use App\Http\Controllers\OrderController;
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

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/', [FrontpageController::class, 'home']);

Route::post('/orders', [OrderController::class, 'store']);

Route::get('/orders', [OrderController::class, 'index']);
Route::get('/items/{id}', [OrderController::class, 'items']);

Route::get('/orders/{id}', [OrderController::class, 'edit']);
Route::patch('/orders/{id}', [OrderController::class, 'update']);
