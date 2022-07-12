<?php

use App\Http\Controllers\API\V1\BorrowRoomApiController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ActionController;
use App\Http\Controllers\KursiController;
use App\Http\Controllers\Auth;
use App\Http\Middleware\CheckAuth;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\BookingKursi;
use App\Http\Controllers\Admin\MasterPekerjaController;

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
Route::post('/auth-login', [Auth::class, 'login'])->name('auth-login');
Route::post('/auth-login-pekerja', [Auth::class, 'loginPekerja'])->name('auth-login-pekerja');

Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/rooms', [HomeController::class, 'rooms'])->name('rooms');

Route::middleware([CheckAuth::class])->group(function () {
    Route::get('/sign-out', [Auth::class, 'signout'])->name('sign-out');
    Route::get('/book-rooms', [HomeController::class, 'book_rooms'])->name('book-rooms');
    Route::get('/book-seat', [HomeController::class, 'book_seat'])->name('book-seat');
    Route::post('/get-fungsi', [ActionController::class, 'get_fungsi'])->name('get-fungsi');
    Route::post('/get-kursi', [ActionController::class, 'get_kursi'])->name('get-kursi');
    Route::post('/get-kursi-data', [ActionController::class, 'get_kursi_data'])->name('get-kursi-data');
    Route::post('/get-template', [ActionController::class, 'get_template'])->name('get-template');
    Route::post('/get-departemen', [ActionController::class, 'get_departemen'])->name('get-departemen');
    Route::get('/data-booking', [HomeController::class, 'data_booking'])->name('data-booking');
    Route::get('/my-account', [HomeController::class, 'my_account'])->name('my-account');

    Route::get('/view-ticket/{id}', [KursiController::class, 'view_ticket'])->name('view-ticket');
    Route::get('/scan-qrcode', [KursiController::class, 'scan_qrcode'])->name('scan-qrcode');
    Route::get('/download-ticket/{id}', [KursiController::class, 'download_ticket'])->name('download-ticket');

    Route::post('/booking-kursi', [ActionController::class, 'booking_kursi'])->name('booking-kursi');
    Route::post('/confirm-ticket', [ActionController::class, 'confirm_ticket'])->name('confirm-ticket');

    // Admin Page

    Route::get('admin-page', [DashboardController::class, 'index'])->name('admin-index');

    Route::get('input-wfo', [BookingKursi::class, 'input_pekerja_wfo'])->name('input-wfo');
    Route::post('get-info-kursi', [ActionController::class, 'get_info_kursi'])->name('get-info-kursi');
    Route::post('get-pekerja-by-fungsi', [BookingKursi::class, 'get_pekerja_by_fungsi'])->name('get-pekerja-by-fungsi');
    Route::post('save-wfo', [BookingKursi::class, 'save_pekerja_wfo'])->name('save-wfo');


    Route::get('data-pekerja', [MasterPekerjaController::class, 'index'])->name('data-pekerja');
    Route::post('/filter-pekerja', [MasterPekerjaController::class, 'filter_pekerja'])->name('filter-pekerja');
});
