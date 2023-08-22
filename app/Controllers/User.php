<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\Produk;
use App\Models\Cart;
use App\Models\Payments;
use App\Models\UserModel;

class User extends BaseController
{

    public $apiKey = "240107374a697fa63aa22f7346ad14f8";

    public function cart()
    {
        // Ambil user ID dari sesi atau data yang sesuai
        $id = session()->get('id'); // Gantilah 'user_id' dengan sesi yang sesuai

        $cartModel = new Cart();
        $cartItems = $cartModel->getCartByUserId($id);

        // Mendapatkan detail produk untuk setiap produk_code
        foreach ($cartItems as &$item) {
            $productDetail = $cartModel->getProductByCode($item['produk_code']);
            $item['product'] = $productDetail;
        }

        $data['cartItems'] = $cartItems;

        echo view('components/navbar');
        return view('pages/cart', $data);
    }
    public function updateCart($id)
    {
        $cartModel = new Cart(); // Adjust this to match your Cart model instantiation

        $newQuantity = $this->request->getPost('quantity'); // Get the updated quantity from the form

        if ($newQuantity >= 0) {
            $cartModel->updateCartQuantity($id, $newQuantity);

            // Redirect back to the cart page
            return redirect()->to('/keranjang');
        }
    }

    public function removeFromCart($id)
    {
        $cartModel = new Cart();
        $cartModel->removeCart($id);

        return redirect()->to('/keranjang')->with('success', 'Product removed from cart successfully.');
    }

    public function productSingel()
    {
        $productModel = new Produk();
        $dataProduct['product'] = $productModel->findAll();
        $userModel = new UserModel();
        $id = session()->get('id');
        $data['user'] = $userModel->where('id', $id)->findAll();

        echo view('components/navbar');
        echo view('pages/produkPage', $dataProduct, $data);
    }

    public function userTransaction()
    {
        $paymentModel = new Payments();
        $id = session()->get('id');
        $data['payments'] = $paymentModel->where('user_id', $id)->findAll();
    }

    public function setting()
    {
        $userModel = new UserModel();
        $id = session()->get('id');
        $user = $userModel->where('id', $id)->first(); // Use first() instead of findAll()

        // API Rajaongkir function
        $datakota = curl_init();
        $dataprovinsi = curl_init();

        // Setting up cURL options for city data
        curl_setopt_array($datakota, array(
            CURLOPT_URL => "https://api.rajaongkir.com/starter/city",
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => "",
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 30,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => "GET",
            CURLOPT_HTTPHEADER => array(
                "key: " . $this->apiKey,
            ),
        ));

        // Setting up cURL options for province data
        curl_setopt_array($dataprovinsi, array(
            CURLOPT_URL => "https://api.rajaongkir.com/starter/province",
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => "",
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 30,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => "GET",
            CURLOPT_HTTPHEADER => array(
                "key: " . $this->apiKey,
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
            $data = [
                'user' => $user,
                'kota' => $kotaData,
                'provinsi' => $provinsiData,
            ];
        }

        echo view('components/user/U_header');
        echo view('components/user/U_sidebar');
        echo view('components/user/U_topbar');
        echo view('components/user/U_settingDash', $data);
        echo view('components/user/U_footer');
    }


    public function userUpdate($id)
    {
        $userModel = new UserModel();

        // Validasi input
        $validation = \Config\Services::validation();
        $validation->setRules([
            'name' => 'required',
            'address' => 'required',
            'negara' => 'required',
            // tambahkan validasi lainnya sesuai kebutuhan
        ]);

        if (!$validation->withRequest($this->request)->run()) {
            // Validasi gagal, kembalikan ke halaman edit dengan pesan error
            return redirect()->back()->withInput()->with('errors', $validation->getErrors());
        }

        // Ambil data input dari form
        $userData = [
            'name' => $this->request->getPost('name'),
            'address' => $this->request->getPost('address'),
            'negara' => $this->request->getPost('negara'),
            'kodepos' => $this->request->getPost('kodepos'),
            'provinsi' => $this->request->getPost('provinsi'),
            'kota' => $this->request->getPost('kota'),
            'password' => password_hash($this->request->getVar('password'), PASSWORD_DEFAULT)
        ];

        // Update data user
        $userModel->update($id, $userData);

        // Redirect ke halaman sebelumnya dengan pesan sukses
        return redirect()->back()->with('success', 'Data user berhasil diupdate');
    }
}
