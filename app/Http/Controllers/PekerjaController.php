<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;


class PekerjaController extends Controller
{
    public function index()
    {
        
    }

    public function request_wfo()
    {
        $getDirektorat = DB::table('ref_direktorat')->get();
        $tipeForm = "request";
        $return = [
            'getDirektorat', 'tipeForm'
        ];

        return view('pages.pekerja.request_wfo', compact($return));
    }

    public function get_atasan_fungsi()
    {
        $id = json_decode($_POST['datanya']);

        $getAtasan = DB::table('users')
            ->where('fungsi', $id)
            ->where('role', 'approver')
            ->get();

        return json_encode($getAtasan);
    }

    public function submit_wfo()
    {
        $data = json_decode($_POST['datanya']);
        $getSession = Session::get('user_access');

        $insertData = [
            'nomorPekerja' => $getSession['user_nopek'],
            'namaLengkap' => $getSession['user_nama'],
            'direktorat' => $data->direktorat,
            'fungsi' => $data->fungsi,
            'tglMulai' => $data->tglStart,
            'tglSelesai' => $data->tglFinish,
            'approver' => $data->atasan,
            'keterangan' => $data->keterangan,
            'createdby' => $getSession['user_id'],
        ];

        $action = DB::table('trx_approval')->insertGetId($insertData);
        
        if ($action > 0) {
            $notif = [
                'status' => 'success',
                'message' => 'Save data success!',
                'id' => $action,
                'alert' => 'success'
            ];
            echo json_encode($notif);
            return;
        } else {
            $notif = [
                'status' => 'warning',
                'message' => 'Save data failed!',
                'alert' => 'warning'
            ];
            echo json_encode($notif);
            return;
        }
    }
}
