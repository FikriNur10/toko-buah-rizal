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

    public function konfirmasi($id)
    {
        $transactionModel = new Payments();
        $transaction = $transactionModel->find($id);

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
    public function updateStatus($id)
    {
        $transactionModel = new Payments();
        $transaction = $transactionModel->find($id);

        if ($transaction) {
            $data = [
                'trans_status' => $this->request->getPost('trans_status')
            ];

            $transactionModel->update($id, $data);

            return redirect()->to('/dashboard/konfirmasi')->with('success', 'Transaction status updated successfully.');
        } else {
            return redirect()->to('/dashboard/konfirmasi')->with('error', 'Transaction not found.');
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
        $data = [
            'title' => 'Daftar Transaksi',
            'transactions' => $transactions,
            'userModel' => $userModel,
            'totalUsers' => $totalUsers,
            'totalproducts' => $totalproducts,
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

                    foreach ($quantities as $quantity) {
                        $totalProducts += $quantity;
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

    public function daftarUser()
    {
        $data = [
            'title' => 'Daftar User'
        ];
        $userModel = new UserModel();
        $dataUser['users'] = $userModel->findAll();

        echo view('components/admin/A_header', $data);
        echo view('components/admin/A_sidebar');
        echo view('components/admin/A_topbar', $data);
        echo view('components/admin/A_daftarUser', $dataUser);
        echo view('components/admin/A_footer');
    }
}
