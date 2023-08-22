<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\Produk;
use App\Models\UserModel;
use App\Models\Cart;
use App\Models\Payments;

class Admin extends BaseController
{
    // for AdminController
    public function productDash()
    {
        $data = [
            'title' => 'Product'
        ];

        $productModel = new Produk();
        $dataProduct['product'] = $productModel->findAll();
        echo view('components/admin/A_header', $data);
        echo view('components/admin/A_sidebar');
        echo view('components/admin/A_topbar', $data);
        echo view('components/admin/A_produkDash', $dataProduct);
        echo view('components/admin/A_footer');
    }

    public function detailKonfirmasi($id)
    {
        $transactionModel = new Payments();
        $transactions = $transactionModel->find($id);

        $produkModel = new Produk();
        $products = $produkModel->findAll();
        $nameProduk = [];
        foreach ($products as $product) {
            $nameProduk[$product['produk_code']] = $product['name'];
        }

        $data = [
            'title' => 'Konfirmasi',
            'transaction' => $transactions,
            'nameProduk' => $nameProduk, // Add the nameProduk array to the data
        ];

        echo view('components/admin/A_header', $data);
        echo view('components/admin/A_sidebar');
        echo view('components/admin/A_topbar', $data);
        echo view('components/admin/A_konfirmasiDash', $data);
        echo view('components/admin/A_footer');
    }

    public function updateStatus($id)
    {
        $transactionModel = new Payments();
        $transaction = $transactionModel->find($id);

        if ($transaction) {
            // Get the products and quantities from the transaction
            $produkCodes = json_decode($transaction['produk_code']);
            $quantities = json_decode($transaction['quantity']);

            foreach ($produkCodes as $index => $produkCode) {
                $produkModel = new Produk();
                $product = $produkModel->where('produk_code', $produkCode)->first();

                var_dump($product); // Debugging statement

                if ($product) {
                    // Calculate the new stock after deducting the quantity
                    $newStock = $product['stock'] - $quantities[$index];

                    var_dump($newStock); // Debugging statement

                    // Update the product's stock in the Produk table
                    $produkModel->update($product['id'], ['stock' => $newStock]);
                }
            }

            $data = [
                'trans_status' => $this->request->getPost('trans_status')
            ];

            $transactionModel->update($id, $data);

            return redirect()->to('/dashboard/transaksi')->with('success', 'Transaction status updated successfully.');
        } else {
            return redirect()->to('/dashboard/transaksi')->with('error', 'Transaction not found.');
        }
    }
    public function tambahProduk()
    {
        $data = [
            'title' => 'Tambah Data'
        ];

        echo view('components/admin/A_header', $data);
        echo view('components/admin/A_sidebar');
        echo view('components/admin/A_topbar', $data);
        echo view('components/admin/A_addProduk');
        echo view('components/admin/A_footer');
    }

    public function daftarTransaksi()
    {
        $transactionModel = new Payments();
        $produkModel = new Produk();
        $transactions = $transactionModel->findAll(); // Mengambil semua data transaksi

        $userModel = new UserModel();
        $totalUsers = $userModel->countAll();
        $totalproducts = $produkModel->countAll();
        $nameProduk = $produkModel->findAll();
        $data = [
            'title' => 'Daftar Transaksi',
            'transactions' => $transactions,
            'userModel' => $userModel,
            'totalUsers' => $totalUsers,
            'totalproducts' => $totalproducts,
            'nameProduk' => $nameProduk
        ];

        // Fungsi untuk menghitung jumlah produk dan total dari transaksi
        function calculateTotalProductsAndTotal($transactions, $produkModel)
        {
            $totalProducts = 0;
            $grandTotal = 0;

            foreach ($transactions as $trans) {
                if ($trans['trans_status'] === 'success') {
                    $produkCodes = json_decode($trans['produk_code']);
                    $quantities = json_decode($trans['quantity']);
                    $totalPrice = $trans['total'];

                    foreach ($quantities as $index => $quantity) {
                        $totalProducts += $quantity;

                        // Update stock if the transaction status is "success"
                        if ($trans['trans_status'] === 'success') {
                            $produkCode = $produkCodes[$index];
                            $product = $produkModel->where('produk_code', $produkCode)->first();

                            if ($product) {
                                $newStock = $product['stock'] - $quantity;
                                $produkModel->update($product['id'], ['stock' => $newStock]);
                            }
                        }
                    }

                    $grandTotal += $totalPrice;
                }
            }

            return ['totalProducts' => $totalProducts, 'grandTotal' => $grandTotal];
        }

        $calculations = calculateTotalProductsAndTotal($transactions, $produkModel);

        $data['totalProducts'] = $calculations['totalProducts'];
        $data['grandTotal'] = $calculations['grandTotal'];
        echo view('components/admin/A_header', $data);
        echo view('components/admin/A_sidebar');
        echo view('components/admin/A_topbar', $data);
        echo view('components/admin/A_transaksi', $data);
    }

    public $apiKey = "240107374a697fa63aa22f7346ad14f8";

    public function daftarUser()
    {
        $data = [
            'title' => 'Daftar User'
        ];

        $userModel = new UserModel();

        // Mendapatkan provinsi
        $dataprovinsi = curl_init();
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
        $provinsiData = curl_exec($dataprovinsi);
        $provinsi = json_decode($provinsiData, true);

        // Mendapatkan kota
        $datakota = curl_init();
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
        $kotaData = curl_exec($datakota);
        $kota = json_decode($kotaData, true);

        // Menentukan jumlah data per halaman
        $perPage = 100;

        // Mengambil data user dengan pagination
        $currentPage = $this->request->getVar('page') ? $this->request->getVar('page') : 1;
        $users = $userModel->paginate($perPage, 'page', $currentPage);
        $pager = $userModel->pager;

        $dataUser = [
            'users' => $users,
            'pager' => $pager,
            'provinsi' => $provinsi,
            'kota' => $kota
        ];

        echo view('components/admin/A_header', $data);
        echo view('components/admin/A_sidebar');
        echo view('components/admin/A_topbar', $data);
        echo view('components/admin/A_daftarUser', $dataUser);
        echo view('components/admin/A_footer');
    }

    public function deleteUser($id)
    {
        $userModel = new UserModel();
        $userModel->deleteData($id);

        return redirect()->to('/dashboard/user');
    }
    public function tambahUser()
    {
        $data = [
            'title' => 'Tambah User'
        ];

        echo view('components/admin/A_header', $data);
        echo view('components/admin/A_sidebar');
        echo view('components/admin/A_topbar', $data);
        echo view('components/admin/A_tambahuser');
        echo view('components/admin/A_footer');
    }
    public function registerAdmin()
    {
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
            'role'     => $this->request->getVar('role'), // Ganti ini dengan value yang dipilih dari select
            'password' => password_hash($this->request->getVar('password'), PASSWORD_DEFAULT)
        ];
        $model->save($data);
        return redirect()->to('/dashboard/user');
    }

    public function settingAdmin()
    {
        $data = [
            'title' => 'Setting Admin'
        ];
        $userModel = new UserModel();
        $id = session()->get('id');
        $data['user'] = $userModel->where('id', $id)->findAll();

        echo view('components/admin/A_header', $data);
        echo view('components/admin/A_sidebar');
        echo view('components/admin/A_topbar', $data);
        echo view('components/admin/A_akunSetting', $data);
        echo view('components/admin/A_footer');
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
