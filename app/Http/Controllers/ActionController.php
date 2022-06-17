<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Storage;
use Str;


class ActionController extends Controller
{
    //

    public function get_fungsi()
    {
        $id = json_decode($_POST['datanya']);

        $getFungsi = DB::table('ref_fungsi')
            ->where('id_direktorat', $id)
            ->get();

        return json_encode($getFungsi);
    }

    public function get_kursi()
    {
        $id = json_decode($_POST['datanya']);

        $getKursi = DB::table('m_template_kursi')
            ->where('fungsi', $id)
            ->get();

        return json_encode($getKursi);
    }

    public function get_kursi_data()
    {
        $id = json_decode($_POST['datanya']);

        $getKursi = DB::table('m_kursi')
            ->where('fungsi', $id)
            ->get();

        return json_encode($getKursi);
    }

    public function get_template()
    {
        $filename = json_decode($_POST['datanya']);
        $getFile = Storage::disk("resources_views")->get($filename . ".php");
        return json_encode($getFile);
    }

    public static function quickRandom($length = 6)
    {
        $pool = '0123456789ABCDEFGHIJKLMNOPQRSTUVWXYZ';

        return substr(str_shuffle(str_repeat($pool, 5)), 0, $length);
    }

    public function booking_kursi()
    {
        $data = json_decode($_POST['datanya']);
        $getSession = Session::get('user_access');
        $getUser = DB::table('users')
            ->where([
                'userid' => $getSession['user_id'],
            ])
            ->get();

        // Jika Pakai Template
        // $getIDkursi = DB::table('m_kursi')
        //     ->where([
        //         'kode' => $data->kursi,
        //         'fungsi' => $data->fungsi,
        //     ])
        //     ->get();
        // $idKursi = $getIDkursi[0]->ID;

        // Jika Tidak Pakai Template
        $idKursi = $data->kursi;

        $insertData = [
            'kodeBooking' => $this->quickRandom(),
            'user' => $getUser[0]->ID,
            'direktorat' => $data->direktorat,
            'fungsi' => $data->fungsi,
            'kursi' => $idKursi,
            'tglPemakaian' => $data->tglPakai,
            'tipe' => $data->tipe_pakai,
            'jamMulai' => $data->jam_mulai,
            'jamSelesai' => $data->jam_selesai,
            'keterangan' => $data->keterangan,
            'status' => '0',
            'createdby' => $getUser[0]->userid
        ];

        // print_r($insertData);
        // die;

        $action = DB::table('trx_bookingkursi')->insert($insertData);

        if ($action) {
            $notif = [
                'status' => 'success',
                'message' => 'Save data success!',
                'id' => $id = DB::getPdo()->lastInsertId(),
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
