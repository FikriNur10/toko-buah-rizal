<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\Payments;
use App\Models\UserModel;
use App\Models\Produk;
class Dashboard extends BaseController
{
    public function index()
    {
        if (session()->get('role') == 'user') {
            $paymentModel = new Payments();
            $id = session()->get('id');
            $data['payments'] = $paymentModel->where('user_id', $id)->findAll();

            echo view('components/user/U_header');
            echo view('components/user/U_sidebar');
            echo view('components/user/U_topbar');
            echo view('components/user/U_orderDash', $data);
            echo view('components/user/U_footer');
        } else if (session()->get('role') == 'admin') {
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
            function calculateTotalProductsAndTotal($transactions, $produkModel) {
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
            echo view('components/admin/A_orderDash');
            echo view('components/admin/A_footer');
        }

        return view('pages/dashboard');
    }

    // for AdminController
    public function productDash()
    {
        $data = [
            'title' => 'Product'
        ];
        echo view('components/user/U_header', $data);
        echo view('components/admin/A_sidebar');
        echo view('components/admin/A_topbar', $data);
        echo view('components/admin/A_produkDash');
        echo view('components/admin/A_footer');
    }

    public function konfirmasi()
    {
        $data = [
            'title' => 'Penjualan'
        ];
        echo view('components/admin/A_header', $data);
        echo view('components/admin/A_sidebar');
        echo view('components/admin/A_topbar', $data);
        echo view('components/admin/A_konfirmasiDash');
        echo view('components/admin/A_footer');
    }

    public function tambahProduk()
    {
        $data = [
            'title' => 'Tambah Data'
        ];
        echo view('components/user/U_header', $data);
        echo view('components/admin/A_sidebar');
        echo view('components/admin/A_topbar', $data);
        // echo view('components/admin/A_tambahData');
        echo view('components/admin/A_footer');
    }
}
