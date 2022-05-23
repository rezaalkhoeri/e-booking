<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;

class HomeController extends Controller
{
    public function index()
    {
        $getRuangan = DB::table('tbl_MST_Ruangan')
            ->select('tbl_MST_Ruangan.*', 'tbl_MST_KlasifikasiRuangan.NamaKlasifikasi')
            ->join('tbl_MST_KlasifikasiRuangan', 'tbl_MST_Ruangan.IdKlasifikasi', 'tbl_MST_Ruangan.IdKlasifikasi')
            ->take(10)->get();

        $return = [
            'getRuangan'
        ];

        return view('index', compact($return));
    }

    public function rooms()
    {
        $getRuangan = DB::table('tbl_MST_Ruangan')
            ->select('tbl_MST_Ruangan.*', 'tbl_MST_KlasifikasiRuangan.NamaKlasifikasi')
            ->join('tbl_MST_KlasifikasiRuangan', 'tbl_MST_Ruangan.IdKlasifikasi', 'tbl_MST_Ruangan.IdKlasifikasi')

            ->paginate(20);

        $return = [
            'getRuangan'
        ];

        return view('pages.rooms', compact($return));
    }

    public function book_rooms()
    {
        $getOrder = DB::table('tbl_TRM_OrderRuangan')
            ->orderBy('tanggalCreate', 'desc')
            ->take(10)
            ->get();

        $getCostCenter = DB::table('tbl_CostCenter')->get();

        $getRuangan = DB::table('tbl_MST_Ruangan')
            ->select('tbl_MST_Ruangan.*', 'tbl_MST_KlasifikasiRuangan.NamaKlasifikasi')
            ->join('tbl_MST_KlasifikasiRuangan', 'tbl_MST_Ruangan.IdKlasifikasi', 'tbl_MST_Ruangan.IdKlasifikasi')
            ->get();

        $return = [
            'getOrder', 'getCostCenter'
        ];

        return view('pages.book_rooms', compact($return));
    }

    public function book_seat()
    {
        return view('pages.book_seat');
    }

    public function data_booking()
    {
        return view('pages.data_booking');
    }
}
