<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\UserModel;

class Register extends BaseController
{
    public $apiKey = "240107374a697fa63aa22f7346ad14f8";

    public function __construct()
    {
        helper(['form']);
    }

    public function index()
    {
        // API Raja ongkir function
        $datakota = curl_init();
        $dataprovinsi = curl_init();
        // ini untuk kota
        curl_setopt_array($datakota, array(
            CURLOPT_URL => "https://api.rajaongkir.com/starter/city",
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => "",
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 30,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => "GET",
            CURLOPT_HTTPHEADER => array(
                "key:" . $this->apiKey,
            ),
        ));
        // ini untuk provinsi
        curl_setopt_array($dataprovinsi, array(
            CURLOPT_URL => "https://api.rajaongkir.com/starter/province",
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => "",
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 30,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => "GET",
            CURLOPT_HTTPHEADER => array(
                "key:" . $this->apiKey,
            ),
        ));

        // Execute cURL requests
        $kota = curl_exec($datakota);
        $provinsi = curl_exec($dataprovinsi);

        // Close cURL handles
        curl_close($datakota);

        // Decode JSON responses
        $kotaData = json_decode($kota, true);
        $provinsiData = json_decode($provinsi, true);

        // Check for cURL errors
        $kotaError = curl_error($datakota);

        // Prepare data array for the view
        $data = array();

        if ($kotaError) {
            $data['kota'] = array('error' => true);
        } else {
            $data['kota'] = $kotaData;
            $data['provinsi'] = $provinsiData;
        }
        return view('pages/register', $data);
    }

    public function register()
    {
        $rules = [
            'name' => 'required|min_length[3]|max_length[20]',
            'email' => ['rules' => 'required|min_length[4]|max_length[255]|valid_email|is_unique[users.email]'],
            'address' => 'required|min_length[10]|max_length[255]',
            'kodepos' => 'required|min_length[5]|max_length[10]',
            'negara' => 'required',
            'kota' => 'required',
            'provinsi' => 'required',
            'phone' => 'required|min_length[10]|max_length[14]',
            'role' => 'required',
            'password' => ['rules' => 'required|min_length[8]|max_length[255]'],
            'confirm_password'  => ['label' => 'confirm password', 'rules' => 'matches[password]']
        ];


        if ($this->validate($rules)) {
            $model = new UserModel();
            $data = [
                'name'     => $this->request->getVar('name'),
                'email'    => $this->request->getVar('email'),
                'address'  => $this->request->getVar('address'),
                'kodepos' => $this->request->getVar('kodepos'),
                'negara'   => $this->request->getVar('negara'),
                'kota'     => $this->request->getVar('kota'),
                'provinsi' => $this->request->getVar('provinsi'),
                'phone'    => $this->request->getVar('phone'),
                'role'     => $this->request->getVar('role'),
                'password' => password_hash($this->request->getVar('password'), PASSWORD_DEFAULT)
            ];
            $model->save($data);
            return redirect()->to('/login');
        } else {
            $data['validation'] = $this->validator;
            return view('pages/register', $data);
        }
    }
}
