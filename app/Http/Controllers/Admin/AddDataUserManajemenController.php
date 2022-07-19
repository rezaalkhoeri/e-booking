<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Support\Facades\Hash;

class AddDataUserManajemenController extends Controller
{
    public function index(){

        $getUsers = DB::table('users')->get();
        $getDirektorat = DB::table('ref_direktorat')->get();
        $return = [
            'getUsers',
            'getDirektorat',
        ];
        return view('admin/data_master/add_data_user_manajemen', compact($return));
    }

    public function add_pekerja(){
        Alert::success('Success', 'Add User Success');
        $data = json_decode($_POST['datanya']);
        $sou = $data->source;
        $ema = $data->email;
        $pas = $data->password;
        $rol = $data->role;
        $dir = $data->direktorat;
        $fun = $data->fungsi;
        
        //`ID`, `userid`, `email`, `password`, `role`, `fungsi`, `source`, `isAktif`, `createdtime`, `createdby` 
        $insertData = [
            'userid' => substr($ema, 0, strpos($ema, '@')),
            'email' => $ema,
            'password' => Hash::make($pas),
            'role' => $rol,
            'fungsi' => $fun,
            'source' => $sou
        ];

        $action = DB::table('users')->insert($insertData);
        if ($action) {
            $notif = [
                'status' => 'success',
                'message' => 'Save data success!',
                // 'id' => $id = DB::getPdo()->lastInsertId(),
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