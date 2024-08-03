<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\UserModel;
use App\Models\Produk;
use App\Models\Cart;
use App\Models\Payments;

class Pembayaran extends BaseController
{
    public $apiKey = "";

    public function index()
    {
        $userModel = new UserModel();
        $cartModel = new Cart();

        $id = session()->get('id');
        $user = $userModel->select('id,name,address,kodepos,negara,kota,provinsi,phone')->find($id);

        $cartItems = $cartModel->getCartByUserId($id);

        // Mendapatkan detail produk untuk setiap produk_code
        foreach ($cartItems as &$item) {
            $productDetail = $cartModel->getProductByCode($item['produk_code']);
            $item['product'] = $productDetail;
        }
        // Calculate the total quantity
        $totalQuantity = array_reduce($cartItems, function ($carry, $item) {
            return $carry + $item['quantity'];
        }, 0);

        $weight = $totalQuantity * 1000;
        $cart['cartItems'] = $cartItems;

        $userKota = $user['kota'];

        $curl = curl_init();

        curl_setopt_array($curl, array(
            CURLOPT_URL => "https://api.rajaongkir.com/starter/cost",
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => "",
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 30,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => "POST",
            CURLOPT_POSTFIELDS => "origin=151&destination=" . urlencode($userKota) . "&weight=" . urlencode($weight) . "&courier=jne",
            CURLOPT_HTTPHEADER => array(
                "content-type: application/x-www-form-urlencoded",
                "key:" . $this->apiKey,
            ),
        ));

        $response = curl_exec($curl);
        $response = json_decode($response, true);
        $err = curl_error($curl);

        curl_close($curl);

        $data = [
            'user' => $user,
            'cart' => $cart,
            'paymentDetails' => $response,
            'totalQuantity' => $totalQuantity, // Add the total quantity to the data
        ];

        echo view('components/navbar');
        return view('pages/confirm_payment', $data);
    }

    public function store()
    {
        $produkModel = new Produk();
        $transactionModel = new Payments();
        $cartModel = new Cart();

        $user_id = session()->get('id');
        $buktiPembayaran = $this->request->getFile('bukti_pembayaran');
        $produkCodes = $this->request->getPost('produk_code');
        $quantities = $this->request->getPost('quantity');
        $ongkir = $this->request->getPost('ongkir');

        // Ambil data dari tabel cart
        $cartItems = $cartModel->where('user_id', $user_id)->findAll();
        $produkCodes = $cartModel->where('produk_code', $produkCodes)->findAll();
        if (!empty($cartItems)) {
            $produkCodes = [];
            $quantities = [];

            $total = 0;

            foreach ($cartItems as $cartItem) {
                $product = $produkModel->where('produk_code', $cartItem['produk_code'])->first();
                if ($product) {
                    $hargaProduk = $product['price'];
                    $total += $hargaProduk * $cartItem['quantity'];
                    $produkCodes[] = $cartItem['produk_code'];
                    $quantities[] = $cartItem['quantity'];
                }
            }

            // Menggabungkan array menjadi string yang sesuai format
            $produkCodeString = '["' . implode('","', $produkCodes) . '"]';

            // Simpan data ke tabel transaction
            $transactionData = [
                'trans_code' => uniqid(),
                'user_id' => $user_id,
                'produk_code' => $produkCodeString,
                'quantity' => json_encode($quantities),
                'total' => $total + $ongkir,
                'image' => $buktiPembayaran->getName(),
                'trans_status' => 'pending',
            ];

            $transactionModel->insert($transactionData);

            $buktiPembayaran->move('./uploads', $buktiPembayaran->getName());

            return redirect()->to('/dashboard');
        } else {
        }
    }
    public function konfirmasi($id)
    {
        $transactionModel = new Payments();
        $transaction = $transactionModel->where('id', $id)->first();

        if (!$transaction) {
            // Jika transaksi tidak ditemukan, mungkin Anda ingin menangani kasus ini, seperti menampilkan pesan error atau melakukan pengalihan.
            return redirect()->to('/dashboard')->with('error', 'Transaksi tidak ditemukan');
        }

        $data = [
            'title' => 'Konfirmasi',
            'transaction' => $transaction,
        ];

        echo view('components/admin/A_header', $data);
        echo view('components/admin/A_sidebar');
        echo view('components/admin/A_topbar', $data);
        echo view('components/admin/A_konfirmasiDash', $data);
        echo view('components/admin/A_footer');
    }
}
