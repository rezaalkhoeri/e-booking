<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    public function index()
    {
        $getRuangan = DB::table('m_ruangmeeting')->take(10)->get();

        $return = [
            'getRuangan'
        ];

        return view('index', compact($return));
    }

    public function rooms()
    {
        $getRuangan = DB::table('m_ruangmeeting')->paginate(20);

        $return = [
            'getRuangan'
        ];

        return view('pages.rooms', compact($return));
    }

    public function book_rooms()
    {
        // $getOrder = DB::table('tbl_TRM_OrderRuangan')
        //     ->orderBy('tanggalCreate', 'desc')
        //     ->take(10)
        //     ->get();

        // $getCostCenter = DB::table('tbl_CostCenter')->get();

        // $getRuangan = DB::table('tbl_MST_Ruangan')
        //     ->select('tbl_MST_Ruangan.*', 'tbl_MST_KlasifikasiRuangan.NamaKlasifikasi')
        //     ->join('tbl_MST_KlasifikasiRuangan', 'tbl_MST_Ruangan.IdKlasifikasi', 'tbl_MST_Ruangan.IdKlasifikasi')
        //     ->get();

        // $return = [
        //     'getOrder', 'getCostCenter'
        // ];

        return view('pages.book_rooms');
    }

    public function book_seat()
    {
        $getDirektorat = DB::table('ref_direktorat')->get();
        $return = [
            'getDirektorat'
        ];

        return view('pages.book_seat', compact($return));
    }

    public function my_account()
    {
        return view('pages.my_account');
    }

    public function data_booking()
    {
        return view('pages.data_booking');
    }
}
