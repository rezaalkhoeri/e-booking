<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class MasterPekerjaController extends Controller
{
    public function index()
    {

        $time = Carbon::now()->format('Y-m-d');
        $getDirektorat = DB::Connection('absensi')->table('ref_direktorat')->get();
        $getAbsen = DB::Connection('absensi')->table('tb_aktifitas')
            ->whereDate('createdtime', '=', $time);

        $getPekerja = DB::Connection('absensi')->table('tb_biodata')
            ->select(
                'tb_biodata.*',
                'ref_direktorat.nama as direktorat',
                'ref_fungsi.nama as fungsi',
                'ref_departemen.nama as departemen',
                'tb_aktifitas.createdtime as tgl'
            )
            ->leftJoinSub($getAbsen, 'tb_aktifitas', function ($leftJoin) {
                $leftJoin->on('tb_biodata.ID', '=', 'tb_aktifitas.id_biodata');
            })
            ->join('ref_direktorat', 'ref_direktorat.ID', 'tb_biodata.direktorat')
            ->join('ref_fungsi', 'ref_fungsi.ID', 'tb_biodata.fungsi')
            ->join('ref_departemen', 'ref_departemen.ID', 'tb_biodata.departemen')
            ->get();

        $return = [
            'getDirektorat',
            'getPekerja'
        ];

        return view('admin/data_master/data_pekerja', compact($return));
    }

    public function filter_pekerja()
    {
        $data = json_decode($_POST['datanya']);
        $time = Carbon::now()->format('Y-m-d');
        $dir = $data->direktorat;
        $fun = $data->fungsi;
        $dep = $data->departemen;
        $getAbsen = DB::Connection('absensi')->table('tb_aktifitas')
            ->whereDate('createdtime', '=', $time);
        $getBiodata = DB::connection('absensi')->table('tb_biodata')
            ->select(
                'tb_biodata.*',
                'ref_direktorat.nama as direktorat',
                'ref_fungsi.nama as fungsi',
                'ref_departemen.nama as departemen',
                'tb_aktifitas.createdtime as tgl'
            )
            ->leftJoinSub($getAbsen, 'tb_aktifitas', function ($leftJoin) {
                $leftJoin->on('tb_biodata.ID', '=', 'tb_aktifitas.id_biodata');
            })
            ->join('ref_direktorat', 'ref_direktorat.ID', 'tb_biodata.direktorat')
            ->join('ref_fungsi', 'ref_fungsi.ID', 'tb_biodata.fungsi')
            ->join('ref_departemen', 'ref_departemen.ID', 'tb_biodata.departemen')
            ->where('tb_biodata.direktorat', '=', $dir)
            ->where('tb_biodata.fungsi', '=', $fun)
            ->where('tb_biodata.departemen', '=', $dep)
            ->get();

        return json_encode($getBiodata);
    }
}
