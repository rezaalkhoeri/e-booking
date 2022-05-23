<?php

use App\Http\Controllers\API\V1\BorrowRoomApiController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\Auth;
use Illuminate\Routing\Router;
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

Route::get('/login-page', [Auth::class, 'index'])->name('login-page');
Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/rooms', [HomeController::class, 'rooms'])->name('rooms');
Route::get('/book-rooms', [HomeController::class, 'book_rooms'])->name('book-rooms');
Route::get('/book-seat', [HomeController::class, 'book_seat'])->name('book-seat');
Route::get('/data-booking', [HomeController::class, 'data_booking'])->name('data-booking');
