<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class MasterKursiController extends Controller
{
    public function index(){
        $getDirektorat = DB::table('ref_direktorat')->get();
        $getKursi = DB::table('ref_fungsi')
                    ->select(
                        'ref_fungsi.nama as nama_fungsi',
                        'ref_direktorat.nama as direktorat',
                        'm_kursi.fungsi as id_fungsi',
                        DB::raw('COUNT(m_kursi.status) AS jumlah'),
                        DB::raw('COUNT(IF(m_kursi.status=1,m_kursi.fungsi,NULL)) AS tersedia'),
                        DB::raw('COUNT(IF(m_kursi.status=2 or m_kursi.status=3,fungsi,NULL)) AS terisi'))
                    ->JOIN('m_kursi','m_kursi.fungsi','=','ref_fungsi.ID')
                    ->JOIN('ref_direktorat', 'ref_direktorat.ID', '=', 'ref_fungsi.id_direktorat')
                    ->groupBy('m_kursi.fungsi')
                    ->groupBy('ref_fungsi.nama')
                    ->groupBy('ref_direktorat.nama')
                    ->get();
    
        $return = [
            'getDirektorat',
            'getKursi'
        ];
        return view('admin/data_master/kapasitas_kursi', compact($return));
    }

    public function filter_kursi(){
        $data = json_decode($_POST['datanya']);
        $dir = $data->direktorat;
        $fun = $data->fungsi;
        $getKursi = DB::table('ref_fungsi')
                    ->select(
                        'ref_fungsi.nama as nama_fungsi',
                        'ref_direktorat.nama as direktorat',
                        'm_kursi.fungsi as id_fungsi',
                        DB::raw('COUNT(m_kursi.status) AS jumlah'),
                        DB::raw('COUNT(IF(m_kursi.status=1,m_kursi.fungsi,NULL)) AS tersedia'),
                        DB::raw('COUNT(IF(m_kursi.status=2 or m_kursi.status=3,fungsi,NULL)) AS terisi'))
                    ->JOIN('m_kursi','m_kursi.fungsi','=','ref_fungsi.ID')
                    ->JOIN('ref_direktorat', 'ref_direktorat.ID', '=', 'ref_fungsi.id_direktorat')
                    ->WHERE('m_kursi.fungsi','=',$fun)
                    ->groupBy('m_kursi.fungsi')
                    ->groupBy('ref_fungsi.nama')
                    ->groupBy('ref_direktorat.nama')
                    ->get();
        return json_encode($getKursi);
    }

    public function tambah_kursi(){
        $data = json_decode($_POST['datanya']);

        $url = "sample.pdf";
        $dir = $data->direktorat;
        $fun = $data->fungsi;
        $qty = $data->kapasitas;
        $lbl = $data->label;

        $getFungsi = DB::table('ref_fungsi')->select('nama')->where('ID','=',$fun)->get();
        if ($fun < 10) {
            $fung = '0'.$fun;
        }else {
            $fung = $fun;
        }

        
        // `ID`, `fungsi`, `kode`, `nama`, `status`, `url`, `createdtime`, `createdby`, `updatedtime`, `updatedby` 
        $dataInsert = [];
        for ($i=1; $i <= $qty; $i++) { 
            $kh = 'A';
            $nama = $lbl.' '.$i;
            if ($i > 10) {
                $kh ='B';
                $kd = $kh.$i;
            }elseif ($i > 20) {
                $kh ='C';
                $kd = $kh.$i;
            }else {
                $kd = $kh.$i;
            }
            array_push($dataInsert, [
                'fungsi'=>$fun,
                'kode' => $kd,
                'nama' => $nama,
                'url' => $url,
            ]);
        }

        $insert = DB::table('m_kursi')->insert($dataInsert);
        if ($insert) {
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

    public function detail_kursi(){
        $data = json_decode($_POST['datanya']);

        $idFun = $data->idFungsi;

        $avKursi=DB::table('m_kursi')
                    ->select(
                        'ref_direktorat.nama as direktorat',
                        'ref_fungsi.nama as fungsi',
                        'm_kursi.kode as kodeKursi',
                        'm_kursi.nama as namaKursi')
                    ->join('ref_fungsi','ref_fungsi.ID','=','m_kursi.fungsi')
                    ->join('ref_direktorat','ref_direktorat.ID','=','ref_fungsi.id_direktorat')
                    ->where('m_kursi.status','=', 1)
                    ->where('m_kursi.fungsi','=', $idFun)
                    ->get();
        
        return json_encode($avKursi);
    }

    public function detail_booking(){
        $data = json_decode($_POST['datanya']);

        $idFun = $data->idFungsi;

        $detailBook = DB::table('trx_bookingkursi')
                        ->select(
                            'trx_bookingkursi.nomorPekerja as nomorPekerja',
                            'm_kursi.kode as kodeKursi',
                            'm_kursi.nama as namaKursi')
                        ->join('m_kursi','m_kursi.ID','=','trx_bookingkursi.kursi')
                        ->where('m_kursi.fungsi','=', $idFun)
                        ->where(function ($query) { 
                            $query->where('m_kursi.status','=',2)
                                    ->orWhere('m_kursi.status','=',3);})
                        ->whereRaw('DATE(trx_bookingkursi.tglMulai) = CURRENT_DATE()')
                        ->get();
        
        return json_encode($detailBook);
    }
}