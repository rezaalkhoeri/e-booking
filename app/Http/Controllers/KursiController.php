<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
// use Spatie\Browsershot\Browsershot;

class KursiController extends Controller
{
    //

    public function scan_qrcode()
    {
        return view('pages.ticket.scan_qrcode');
    }

    public function view_ticket($id)
    {
        $getBooking = DB::table('trx_bookingkursi')
            ->select('trx_bookingkursi.*', 'ref_direktorat.nama as direktorat', 'ref_fungsi.nama as fungsi', 'm_kursi.kode as kodeKursi', 'm_kursi.nama')
            ->join('ref_direktorat', 'ref_direktorat.ID', 'trx_bookingkursi.direktorat')
            ->join('ref_fungsi', 'ref_fungsi.ID', 'trx_bookingkursi.fungsi')
            ->join('m_kursi', 'm_kursi.ID', 'trx_bookingkursi.kursi')
            ->where('trx_bookingkursi.ID', $id)
            ->get();

        // echo '<pre>', print_r($getBooking, 1), '</pre>';
        // die;

        $return = ['getBooking'];

        return view('pages.ticket.view_ticket', compact($return));
    }

    public function download_ticket($id)
    {
        $getBooking = DB::table('trx_bookingkursi')
            ->select('trx_bookingkursi.*', 'users.userid', 'ref_direktorat.nama as direktorat', 'ref_fungsi.nama as fungsi', 'm_kursi.kode as kodeKursi', 'm_kursi.nama')
            ->join('users', 'users.ID', 'trx_bookingkursi.user')
            ->join('ref_direktorat', 'ref_direktorat.ID', 'trx_bookingkursi.direktorat')
            ->join('ref_fungsi', 'ref_fungsi.ID', 'trx_bookingkursi.fungsi')
            ->join('m_kursi', 'm_kursi.ID', 'trx_bookingkursi.kursi')
            ->where('trx_bookingkursi.ID', $id)
            ->get();

        $array = $getBooking->map(function ($obj) {
            return (array) $obj;
        })->toArray();

        // echo '<pre>', print_r($array, 1), '</pre>';
        // die;


    }
}
