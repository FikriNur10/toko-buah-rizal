<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\UserModel;
use App\Models\Produk;
use App\Models\Cart;
use App\Models\Payments;

class Pembayaran extends BaseController
{
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

        $cart['cartItems'] = $cartItems;

        $data = [
            'user' => $user,
            'cart' => $cart, // Assuming $cart is an array
        ];

        echo view('components/navbar');
        return view('pages/confirm_payment', $data);
    }

    public function store()
    {
        $userModel = new UserModel();
        $produkModel = new Produk();
        $transactionModel = new Payments();
        $cartModel = new Cart();

        $user_id = session()->get('id');
        $buktiPembayaran = $this->request->getFile('bukti_pembayaran');
        $produkCodes = $this->request->getPost('produk_code');
        $quantities = $this->request->getPost('quantity');


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
                'total' => $total,
                'image' => $buktiPembayaran->getName(),
                'trans_status' => 'pending',
            ];

            $transactionModel->insert($transactionData);

            $buktiPembayaran->move('./uploads', $buktiPembayaran->getName());
            
            return redirect()->to('/dashboard');
        } else {
        }
    }
}
