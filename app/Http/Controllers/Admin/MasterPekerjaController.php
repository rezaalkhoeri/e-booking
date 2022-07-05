<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;

class MasterPekerjaController extends Controller
{
    public function index(){

        $getDirektorat = DB::Connection('absensi')->table('ref_direktorat')->get();
        $return = [
            'getDirektorat',
        ];
        return view('admin/data_master/data_pekerja', compact($return));
    }

    public function filter_pekerja(){
        $data = json_decode($_POST['datanya']);

        $dir = $data->direktorat;
        $fun = $data->fungsi;
        $dep = $data->departemen;

        $getBiodata = DB::connection('absensi')->table('tb_biodata')
                        ->select('tb_biodata.*', 'ref_direktorat.nama as direktorat', 'ref_fungsi.nama as fungsi', 
                                    'ref_departemen.nama as departemen')
                        ->join('ref_direktorat', 'ref_direktorat.ID', 'tb_biodata.direktorat')
                        ->join('ref_fungsi', 'ref_fungsi.ID', 'tb_biodata.fungsi')
                        ->join('ref_departemen', 'ref_departemen.ID', 'tb_biodata.departemen')
                        ->where('direktorat', '=', $dir)
                        ->where('fungsi', '=', $fun)
                        ->where('departemen', '=', $dep)
                        ->get();
        
        return json_encode($getBiodata);
    }
}
