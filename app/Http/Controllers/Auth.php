<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;


class Auth extends Controller
{
    public function index()
    {
        return view('auth.login');
    }

    public function login()
    {
        $data = json_decode($_POST['datanya']);

        if ($data->email && $data->password) {
            $input_email = $data->email;
            $input_pass = $data->password;

            $masuk = false;
            $fungsi = "-";

            $get_member = $this->checkExistMemberLDAP($input_email);

            if (count($get_member) == 0) {
                $notif = [
                    'status' => 'warning',
                    'message' => 'Email Anda Tidak Terdaftar pada sistem E Service PDSI',
                    'alert' => 'warning'
                ];
                echo json_encode($notif);
                return;
            }

            $role = $get_member[0]->role;
            $id_user = $get_member[0]->ID;

            //LDAP
            $params = [
                "UserName"         => $input_email,
                "Password"         => $data->password,
                // "Method" 		=> "login"
                "Method"         => "validate" //bypass login
            ];

            $get_access_ldap = $this->lookup($params);

            if ($get_access_ldap) {

                if ($get_access_ldap['Status'] == 00) {
                    $detildata = $get_access_ldap["Data"];

                    $email = explode('@', $detildata['Email']);

                    $user_access = array(
                        'user_id'     => $email[0],
                        'email'     => $detildata['Email'],
                        'inisial' => $detildata['NamaLengkap'][0],
                        'user_nama' => $detildata['NamaLengkap'],
                        'user_nopek' => $detildata['EmpNumber'],
                        'user_jabatan' => $detildata['PosText'],
                        'fungsi' => $detildata['DirText'],
                        'user_mitra' => $detildata['IsMitra'],
                        'lastcall'     => time()
                        //,'jwttoken' => $detildata["token"]
                    );

                    Session::put('user_access', $user_access);
                    Session::put('role', $role);
                    Session::put('id_user', $id_user);

                    $notif = [
                        'status' => 'success',
                        'message' => 'Login berhasil.',
                        'alert' => 'success',
                        'role' => $role
                    ];
                    echo json_encode($notif);
                    return;
                } else {
                    $notif = [
                        'status' => 'warning',
                        'message' => 'Login melalui account email gagal. Cek Kembali Email dan Password Anda.',
                        'alert' => 'warning'
                    ];
                    echo json_encode($notif);
                    return;
                }
            } else {
                $notif = [
                    'status' => 'warning',
                    'message' => 'Login melalui account email gagal. Koneksi terputus!',
                    'alert' => 'warning'
                ];
                echo json_encode($notif);
                return;
            }
        } else {
            $notif = [
                'status' => 'warning',
                'message' => 'Masukkan username dan password anda.',
                'alert' => 'warning'
            ];
            echo json_encode($notif);
            return;
        }
    }

    public function loginPekerja()
    {
        $data = json_decode($_POST['datanya']);
       
        if ($data->nopek) {
            $nomorPekerja = $data->nopek;
            $getBiodata = DB::connection('absensi')->table('tb_biodata')
                        ->select('tb_biodata.*', 'ref_direktorat.nama as direktorat', 'ref_fungsi.nama as fungsi')
                        ->join('ref_direktorat', 'ref_direktorat.ID', 'tb_biodata.direktorat')
                        ->join('ref_fungsi', 'ref_fungsi.ID', 'tb_biodata.fungsi')
                        ->where([
                            'nomorPekerja' => $nomorPekerja,
                        ])->get();

            if (count($getBiodata) > 0) {
                $getEmail = DB::connection('absensi')->table('ref_email')
                ->where([
                    'nopek' => $nomorPekerja,
                ])->get();
                
                $userID = '';
                $email = '';
                if (count($getEmail) > 0) {
                    $email_arr = explode('@', $getEmail[0]->email);
                    $userID = $email_arr[0];
                    $email = $getEmail[0]->email;
                }

                
                $user_access = array(
                    'user_id'     => $userID,
                    'email'     => $email,
                    'inisial' => $getBiodata[0]->namaLengkap,
                    'user_nama' => $getBiodata[0]->namaLengkap,
                    'user_nopek' => $getBiodata[0]->nomorPekerja,
                    'user_jabatan' => $getBiodata[0]->jabatan,
                    'fungsi' => $getBiodata[0]->fungsi,
                    'user_mitra' => ($getBiodata[0]->statusPekerja == 4 ? true : false),
                    'lastcall'     => time()
                    //,'jwttoken' => $detildata["token"]
                );

                Session::put('user_access', $user_access);
                Session::put('role', 'Pekerja');
                Session::put('id_user', 0);

                $notif = [
                    'status' => 'success',
                    'message' => 'Login berhasil.',
                    'alert' => 'success'
                ];
                echo json_encode($notif);
                return;
            }
            else {
                $notif = [
                    'status' => 'warning',
                    'message' => 'Nomor Pekerja tidak ditemukan, harap periksa kembali nomor pekerja yang digunakan untuk Absensi pada aplikasi absensi Covid PDSI.',
                    'alert' => 'warning'
                ];
                echo json_encode($notif);
                return;
            }
        }
    }


    public function getEncryptPass($username, $password)
    {
        $plaintext = $password . $username;
        $password = '3sc3RLrpd17X';
        $method = 'aes-256-cbc';

        $password = substr(hash('sha256', $password, true), 0, 32);

        $iv = chr(0x0) . chr(0x0) . chr(0x0) . chr(0x0) . chr(0x0) . chr(0x0) . chr(0x0) . chr(0x0) . chr(0x0) . chr(0x0) . chr(0x0) . chr(0x0) . chr(0x0) . chr(0x0) . chr(0x0) . chr(0x0);
        $encrypted = base64_encode(openssl_encrypt($plaintext, $method, $password, OPENSSL_RAW_DATA, $iv));

        return $encrypted;
    }

    public function checkExistMemberLDAP($email)
    {
        $getData = DB::table('users')
            ->where('userid', $email)
            ->get();

        return $getData;
    }

    public function lookup($param)
    {
        $param_set = json_encode($param);

        $link = curl_init("https://apps.pertamina.com/pdsiapi/api/ldap/auth");
        curl_setopt($link, CURLOPT_CUSTOMREQUEST, "POST");
        curl_setopt($link, CURLOPT_POSTFIELDS, $param_set);
        curl_setopt($link, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($link, CURLOPT_HTTPHEADER, array(
            'Content-Type: application/json',
            'Token: ' . 'CqsVvRpqNrS5iZL5SKtlLcPEx7Fkwn2EQ8qCqSv2Ol4WpocHTY9jIjowxN6Dhru5N9enJMiFQ1PqEPtX4CeKvmRk+NUJfUzz/+/AaNBLb66evjLBiTFF/XKFqnal+L13'
        ));
        $contents = curl_exec($link);

        $result = json_decode($contents, true);

        return $result;
    }

    public function signout(Request $request)
    {
        $loginData = Session::get('user_access');
        $request->session()->flush();
        return redirect()->route('login-page');
    }
}
