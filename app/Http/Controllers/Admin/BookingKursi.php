<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;

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

    public function get_pekerja_by_fungsi()
    {
        $id_fungsi = json_decode($_POST['datanya']);
        $getBiodata = DB::connection('absensi')->table('tb_biodata')
            ->where('fungsi', '=', $id_fungsi)
            ->get();

        return json_encode($getBiodata);
    }

    public static function quickRandom($length = 6)
    {
        $pool = '0123456789ABCDEFGHIJKLMNOPQRSTUVWXYZ';

        return substr(str_shuffle(str_repeat($pool, 5)), 0, $length);
    }

    public function save_pekerja_wfo()
    {
        $data = json_decode($_POST['datanya']);

        $getSession = Session::get('user_access');

        $tgl = explode(' - ', $data->tanggalPakai);
        $tglStart = $tgl[0];
        $tglFinish = $tgl[1];

        $getkursi = DB::table('m_kursi')
            ->select('ID')
            ->where([
                'fungsi' => $data->fungsi,
                'status' => '1'
            ])->get()->toArray();


        $insertData = [];
        for ($i = 0; $i < count($data->list_wfo); $i++) {
            array_push($insertData, [
                'kodeBooking' => $this->quickRandom(),
                'nomorPekerja' => $data->list_wfo[$i][0],
                'namaLengkap' => $data->list_wfo[$i][1],
                'direktorat' => $data->direktorat,
                'fungsi' => $data->fungsi,
                'kursi' => $getkursi[$i]->ID,
                'tglMulai' => $tglStart,
                'tglSelesai' => $tglFinish,
                'tipe' => $data->tipePakai,
                'jamMulai' => date("H:i:s", strtotime($data->jamMulai)),
                'jamSelesai' => date("H:i:s", strtotime($data->jamSelesai)),
                'keterangan' => $data->list_wfo[$i][2],
                'tipeRequest' => '1',
                'statusBooking' => '1',
                'createdby' => $getSession['user_nama']
            ]);
        }

        $updatedData = [
            'status' => 2
        ];

        $arrNotif = [];
        for ($i = 0; $i < count($insertData); $i++) {
            $checkExist = DB::table('trx_bookingkursi')->where('nomorPekerja', $insertData[$i]['nomorPekerja'])->get();

            if (count($checkExist) == 0) {
                $action = DB::table('trx_bookingkursi')->insert($insertData[$i]);
                $action_mKursi = DB::table('m_kursi')->where('ID', $insertData[$i]['kursi'])->update($updatedData);
                array_push($arrNotif, $action);
            } else {
                $action = DB::table('trx_bookingkursi')->where('nomorPekerja', $insertData[$i]['nomorPekerja'])->update($insertData[$i]);
                $action_mKursi = DB::table('m_kursi')->where('ID', $insertData[$i]['kursi'])->update($updatedData);
                array_push($arrNotif, $action);
            }
        }

        if (count(array_unique($arrNotif)) === 1) {
            $notif = [
                'status' => 'success',
                'message' => 'Save data success!',
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

    public function monitor_booking()
    {
        $getDirektorat = DB::table('ref_direktorat')->get();
        $getBooking = DB::table('trx_bookingkursi')->get();

        $return = [
            'getDirektorat',
            'getBooking'
        ];

        return view('admin/booking_kursi/monitor_booking', compact($return));
    }

    public function get_booking(Request $request)
    {
        $sql = 'SELECT trx_bookingkursi.*, ref_fungsi.nama as fungsi,  CONCAT(m_kursi.nama, " | ", m_kursi.kode ) AS kodeKursi
        FROM trx_bookingkursi
        JOIN ref_fungsi ON ref_fungsi.ID = trx_bookingkursi.fungsi
        JOIN m_kursi ON m_kursi.ID = trx_bookingkursi.kursi';

        $getBooking = DB::select($sql);

        if ($request->ajax()) {
            return datatables()->of($getBooking)->make(true);
        }
        return view('user.index');
    }

    public function update_booking()
    {
        $data = json_decode($_POST['datanya']);


        $status = '';
        if ($data->action == 'cancel') {
            $status = 4;
        } else {
            $status = 3;
        }

        $arrNotif = [];
        for ($i = 0; $i < count($data->data); $i++) {
            $updatedData = [
                'statusBooking' => $status
            ];
            $updateBooking = DB::table('trx_bookingkursi')->where('ID', $data->data[$i])->update($updatedData);
            array_push($arrNotif, $updateBooking);
        }

        if (count(array_unique($arrNotif)) === 1) {
            $notif = [
                'status' => 'success',
                'message' => 'Update data success!',
                'alert' => 'success'
            ];
            echo json_encode($notif);
            return;
        } else {
            $notif = [
                'status' => 'warning',
                'message' => 'Update data failed!',
                'alert' => 'warning'
            ];
            echo json_encode($notif);
            return;
        }
    }

    public function filter_booking()
    {
        $data = json_decode($_POST['datanya']);

        $direktorat     = $data->direktorat;
        $fungsi         = $data->fungsi;
        $statusBooking  = $data->statusBooking;
        $tipePakai      = $data->tipePakai; 
        $tgl            = explode(' - ', $data->tglPakai);
        $tglStart       = $tgl[0];
        $tglFinish      = $tgl[1];
        $sorting        = $data->sorting;

        $getFilter = DB::table('trx_bookingkursi')
                        ->select(
                            'trx_bookingkursi.*',
                            'ref_fungsi.nama as namaFungsi',
                            'm_kursi.kode as kodeKursi')
                        ->join('ref_fungsi','trx_bookingkursi.fungsi','=','ref_fungsi.ID')
                        ->join('m_kursi','trx_bookingkursi.kursi','=','m_kursi.ID')
                        ->where([
                            ['trx_bookingkursi.direktorat',$direktorat],
                            ['trx_bookingkursi.fungsi',$fungsi],
                            ['trx_bookingkursi.tglMulai',$tglStart],
                            ['trx_bookingkursi.tglSelesai',$tglFinish],
                            ['trx_bookingkursi.tipe',$tipePakai],
                            ['trx_bookingkursi.statusBooking',$statusBooking]])
                        ->orderBy('trx_bookingkursi.ID',$sorting)
                        ->get();
        return json_encode($getFilter);
    }

    public function detail_monitor(){
        $data = json_decode($_POST['datanya']);

        $idBook = $data->id_book;

        $getDetail = DB::table('trx_bookingkursi')->where('ID', $idBook)->get();

        return json_encode($getDetail);
    }
}
