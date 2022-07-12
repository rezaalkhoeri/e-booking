<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;


class ApprovalController extends Controller
{
    public function index()
    {
        
    }

    public function list_approval()
    {
        $getUser = Session::get('user_access');
        $role = Session::get('role');
        $id_user = Session::get('id_user');

        if ($role == "Approver") {
            $getListApproval = DB::table('trx_approval')
                    ->select('trx_approval.*', 'ref_direktorat.nama as direktorat', 'ref_fungsi.nama as fungsi')
                    ->join('ref_direktorat', 'ref_direktorat.ID', 'trx_approval.direktorat')
                    ->join('ref_fungsi', 'ref_fungsi.ID', 'trx_approval.fungsi')
                    ->where('trx_approval.approver', $id_user)
                    ->where('trx_approval.status', 1)
                    ->get();
        } else {
            $getListApproval = DB::table('trx_approval')
                    ->select('trx_approval.*', 'ref_direktorat.nama as direktorat', 'ref_fungsi.nama as fungsi')
                    ->join('ref_direktorat', 'ref_direktorat.ID', 'trx_approval.direktorat')
                    ->join('ref_fungsi', 'ref_fungsi.ID', 'trx_approval.fungsi')
                    ->where('trx_approval.nomorPekerja', $getUser['user_nopek'])
                    ->get();
        }
       

        // echo '<pre>', print_r($getBooking, 1), '</pre>';
        // die;
        $return = ['getListApproval', 'getUser'];

        return view('pages.atasan.list_approval', compact($return));
    }

    public function get_data_approval()
    {
        $id = json_decode($_POST['datanya']);

        $getApproval = DB::table('trx_approval')
                    ->select('trx_approval.*', 'ref_direktorat.nama as direktorat', 'ref_fungsi.nama as fungsi')
                    ->join('ref_direktorat', 'ref_direktorat.ID', 'trx_approval.direktorat')
                    ->join('ref_fungsi', 'ref_fungsi.ID', 'trx_approval.fungsi')
                    ->where('trx_approval.ID', $id)
                    ->get();

        return json_encode($getApproval);
    }

    public function post_status_approval()
    {
        $data = json_decode($_POST['datanya']);

        $updatedData = [
            "status" => $data->status
        ];

        $action = DB::table('trx_approval')->where('ID', $data->ID)->update($updatedData);

        if ($data->status == 2) {
            $message = 'Status Permintaan Berhasil di Approve !';
            $alert = 'success';
        } else {
            $message = 'Status Permintaan Berhasil di Reject !';
            $alert = 'success';
        }

        $notif = [
            'status' => 'success',
            'message' => $message,
            'alert' => $alert
        ];
        echo json_encode($notif);
        return;
    }
}