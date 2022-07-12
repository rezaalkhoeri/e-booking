<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;


class ReservasiController extends Controller
{
    public function index()
    {
        
    }

    public function get_urldenah()
    {
        $result = '';

        $data = json_decode($_POST['datanya']);
        $id = $data->id;

        $datakursi = DB::table('m_kursi')
            ->where([
                'ID' => $id,
            ])
            ->get();

        if (count($datakursi) > 0)
        {
            $result = $datakursi[0]->url;
        }

        $notif = [
            'status' => 'success',
            'url' => $result
        ];

        echo json_encode($notif);
        return;
    }
}