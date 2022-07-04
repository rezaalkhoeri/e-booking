<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class BookingKursi extends Controller
{
    //
    public function input_pekerja_wfo()
    {
        $getDirektorat = DB::table('ref_direktorat')->get();
        $return = [
            'getDirektorat'
        ];

        return view('admin/booking_kursi/input_pekerja_wfo', compact($return));
    }
}
