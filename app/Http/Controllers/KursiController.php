<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class KursiController extends Controller
{
    //

    public function scan_qrcode()
    {
        return view('pages.scan_qrcode');
    }
}
