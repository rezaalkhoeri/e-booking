<?php

use App\Http\Controllers\API\V1\BorrowRoomApiController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ApprovalController;
use App\Http\Controllers\ActionController;
use App\Http\Controllers\KursiController;
use App\Http\Controllers\ReservasiController;
use App\Http\Controllers\PekerjaController;
use App\Http\Controllers\Auth;
use App\Http\Middleware\CheckAuth;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\BookingKursi;
use App\Http\Controllers\Admin\MasterPekerjaController;
use App\Http\Controllers\Admin\UserManajemenController;

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

    /** Menu Request WFO */
    Route::get('/request-wfo', [PekerjaController::class, 'request_wfo'])->name('request-wfo');
    Route::post('/submit-wfo', [PekerjaController::class, 'submit_wfo'])->name('submit-wfo');
    Route::post('/get-atasan-fungsi', [PekerjaController::class, 'get_atasan_fungsi'])->name('get-atasan-fungsi');

    /** Menu Approval Atasan */
    Route::get('/list-approval', [ApprovalController::class, 'list_approval'])->name('list-approval');
    Route::post('/get-data-approval', [ApprovalController::class, 'get_data_approval'])->name('get-data-approval');
    Route::post('/post-status-approval', [ApprovalController::class, 'post_status_approval'])->name('post-status-approval');

    /** Menu Approval Ruangan */
    Route::get('/book-rooms', [HomeController::class, 'book_rooms'])->name('book-rooms');
    Route::get('/book-seat', [HomeController::class, 'book_seat'])->name('book-seat');

    // Action Menu Kursi
    Route::post('/get-fungsi', [ActionController::class, 'get_fungsi'])->name('get-fungsi');
    Route::post('/get-kursi', [ActionController::class, 'get_kursi'])->name('get-kursi');
    Route::post('/get-kursi-data', [ActionController::class, 'get_kursi_data'])->name('get-kursi-data');
    Route::post('/get-template', [ActionController::class, 'get_template'])->name('get-template');
    Route::post('/get-denah-kursi', [ReservasiController::class, 'get_urldenah'])->name('get-denah-kursi');
    Route::post('/get-departemen', [ActionController::class, 'get_departemen'])->name('get-departemen');

    // Menu Akun
    Route::get('/data-booking', [HomeController::class, 'data_booking'])->name('data-booking');
    Route::get('/my-account', [HomeController::class, 'my_account'])->name('my-account');
    Route::get('/view-ticket/{id}', [KursiController::class, 'view_ticket'])->name('view-ticket');
    Route::get('/download-ticket/{id}', [KursiController::class, 'download_ticket'])->name('download-ticket');

    // Scan QR
    Route::get('/scan-qrcode', [KursiController::class, 'scan_qrcode'])->name('scan-qrcode');
    Route::post('/booking-kursi', [ActionController::class, 'booking_kursi'])->name('booking-kursi');
    Route::post('/confirm-ticket', [ActionController::class, 'confirm_ticket'])->name('confirm-ticket');

    // Admin Page
    Route::get('admin-page', [DashboardController::class, 'index'])->name('admin-index');

    // Menu Input WFO
    Route::get('input-wfo', [BookingKursi::class, 'input_pekerja_wfo'])->name('input-wfo');
    Route::post('get-info-kursi', [ActionController::class, 'get_info_kursi'])->name('get-info-kursi');
    Route::post('get-pekerja-by-fungsi', [BookingKursi::class, 'get_pekerja_by_fungsi'])->name('get-pekerja-by-fungsi');
    Route::post('save-wfo', [BookingKursi::class, 'save_pekerja_wfo'])->name('save-wfo');

    Route::get('monitor-booking', [BookingKursi::class, 'monitor_booking'])->name('monitor-booking');
    Route::get('get-booking', [BookingKursi::class, 'get_booking'])->name('get-booking');
    Route::post('update-booking', [BookingKursi::class, 'update_booking'])->name('update-booking');
    Route::post('filter-booking', [BookingKursi::class, 'filter_booking'])->name('filter-booking');
    Route::post('detail-monitor', [BookingKursi::class, 'detail_monitor'])->name('detail-monitor');



    // Menu Master Pekerja
    Route::get('data-pekerja', [MasterPekerjaController::class, 'index'])->name('data-pekerja');
    Route::post('/filter-pekerja', [MasterPekerjaController::class, 'filter_pekerja'])->name('filter-pekerja');

    // Menu Master User
    Route::post('/add-user', [UserManajemenController::class, 'add_pekerja'])->name('add-user');
    Route::get('/user-manajemen', [UserManajemenController::class, 'index'])->name('user-manajemen');
    Route::post('/add-multiple-user', [UserManajemenController::class, 'add_multi_pekerja'])->name('add-multiple-user');
    Route::get('/add-data-user-manajemen', [UserManajemenController::class, 'pekerja_multiple_index'])->name('add-data-user-manajemen');

    // Menu Master Kursi
    Route::get('/data-kursi', [MasterKursiController::class, 'index'])->name('data-kursi');
    Route::post('/filter-kursi', [MasterKursiController::class, 'filter_kursi'])->name('filter-kursi');
    Route::post('/tambah-kursi', [MasterKursiController::class, 'tambah_kursi'])->name('tambah-kursi');
    Route::post('/detail-kursi', [MasterKursiController::class, 'detail_kursi'])->name('detail-kursi');
    Route::post('/detail-booking', [MasterKursiController::class, 'detail_booking'])->name('detail-booking');
});
