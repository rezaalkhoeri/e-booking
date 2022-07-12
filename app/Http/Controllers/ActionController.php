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

    public function get_departemen()
    {
        $id = json_decode($_POST['datanya']);

        $getDepartemen = DB::table('ref_departemen')
            ->where('id_fungsi', $id)
            ->get();

        return json_encode($getDepartemen);
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

    public function get_info_kursi()
    {
        $data = json_decode($_POST['datanya']);

        $getKursi = DB::table('m_kursi')->where(['fungsi' => $data->fungsi])->get();

        if (count($getKursi) == 0) {
            $notif = [
                'status' => 'warning',
                'message' => 'Data kursi kosong!',
                'alert' => 'warning'
            ];
            echo json_encode($notif);
            return;
        } else {
            $fungsi = DB::table('ref_fungsi')->where(['ID' => $data->fungsi])->get();
            $tersedia = DB::table('m_kursi')->where(['fungsi' => $data->fungsi, 'status' => '1'])->count();
            $dibooking = DB::table('m_kursi')->where(['fungsi' => $data->fungsi, 'status' => '2'])->count();
            $digunakan = DB::table('m_kursi')->where(['fungsi' => $data->fungsi, 'status' => '3'])->count();
            $total = DB::table('m_kursi')->where(['fungsi' => $data->fungsi])->count();
            $presentase = ($dibooking + $digunakan) / $total * 100;

            $infoKursi = [
                'fungsi' => $fungsi[0]->nama,
                'tanggal' => date('d-m-Y'),
                'tersedia' => $tersedia,
                'dibooking' => $dibooking,
                'digunakan' => $digunakan,
                'total' => $total,
                'presentase' => $presentase,
            ];

            $notif = [
                'status' => 'success',
                'message' => 'Get data kursi berhasil!',
                'dataKursi' => $infoKursi,
                'alert' => 'success'
            ];

            echo json_encode($notif);
            return;
        }
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
            'nomorPekerja' => $getSession['user_nopek'],
            'direktorat' => $data->direktorat,
            'fungsi' => $data->fungsi,
            'kursi' => $idKursi,
            'tglMulai' => $data->tglStart,
            'tglSelesai' => $data->tglFinish,
            'tipe' => $data->tipe_pakai,
            'jamMulai' => $data->jam_mulai,
            'jamSelesai' => $data->jam_selesai,
            'keterangan' => $data->keterangan,
            'createdby' => $getUser[0]->userid
        ];

        // print_r($insertData);
        // die;

        $action = DB::table('trx_bookingkursi')->insertGetId($insertData);

        $updatedData= [
            'status' => 2
        ];
        $action_mKursi = DB::table('m_kursi')->where('ID', $idKursi)->update($updatedData);
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

    public function confirm_ticket()
    {
        $data = json_decode($_POST['datanya']);
        $getBooking = DB::table('trx_bookingkursi')
            ->where([
                'kodeBooking' => $data->kodeBooking,
            ])
            ->get();

        if (count($getBooking) > 0) {
            $cekConfirm = DB::table('trx_updatedkursi')
                ->where([
                    'kodeBooking' => $data->kodeBooking,
                ])
                ->get();

            if (count($cekConfirm) > 0) {
                $notif = [
                    'status' => 'warning',
                    'message' => 'Kode Booking Sudah digunakan!',
                    'alert' => 'warning'
                ];
                echo json_encode($notif);
                return;
            } else {
                $insertData = [
                    'kodeBooking' => $getBooking[0]->kodeBooking,
                    'user' => $getBooking[0]->user,
                    'direktorat' => $getBooking[0]->direktorat,
                    'fungsi' => $getBooking[0]->fungsi,
                    'kursi' => $getBooking[0]->kursi,
                    'tglPemakaian' => $getBooking[0]->tglPemakaian,
                    'tipe' => $getBooking[0]->tipe,
                    'jamMulai' => $getBooking[0]->jamMulai,
                    'jamSelesai' => $getBooking[0]->jamSelesai,
                    'keterangan' => $getBooking[0]->keterangan,
                    'createdby' => $getBooking[0]->createdby
                ];

                $action = DB::table('trx_updatedkursi')->insert($insertData);

                if ($action) {
                    $updatedData = [
                        'status' => 1
                    ];

                    DB::table('trx_bookingkursi')->where('ID', $getBooking[0]->ID)->update($updatedData);

                    $notif = [
                        'status' => 'success',
                        'message' => 'Ticket Confirmed!',
                        'alert' => 'success'
                    ];
                    echo json_encode($notif);
                    return;
                } else {
                    $notif = [
                        'status' => 'warning',
                        'message' => ' Confirm Ticket Failed!',
                        'alert' => 'warning'
                    ];
                    echo json_encode($notif);
                    return;
                }
            }
        } else {
            $notif = [
                'status' => 'warning',
                'message' => 'Kode booking tidak ditemukan! Silakan pesan tiket terlebih dahulu.',
                'alert' => 'warning'
            ];
            echo json_encode($notif);
            return;
        }
    }
}
