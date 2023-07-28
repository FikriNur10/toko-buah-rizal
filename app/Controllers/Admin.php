<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\UserModel;
use App\Models\Produk;
class Admin extends BaseController
{
    // for AdminController
    public function productDash(){
        $data = [
            'title' => 'Product'
        ];

        $productModel = new Produk();
        $dataProduct['product'] = $productModel->findAll();
        echo view('components/admin/A_header',$data);
        echo view('components/admin/A_sidebar');
        echo view('components/admin/A_topbar', $data);
        echo view('components/admin/A_produkDash',$dataProduct);       
        echo view('components/admin/A_footer');
    }
    
    public function konfirmasi(){
        $data = [
            'title' => 'Penjualan'
        ];
        echo view('components/admin/A_header',$data);
        echo view('components/admin/A_sidebar');
        echo view('components/admin/A_topbar', $data);
        echo view('components/admin/A_konfirmasiDash');
        echo view('components/admin/A_footer');
    }

    public function tambahProduk(){
        $data = [
            'title' => 'Tambah Data'
        ];
        
        echo view('components/admin/A_header',$data);
        echo view('components/admin/A_sidebar');
        echo view('components/admin/A_topbar', $data);
        echo view('components/admin/A_addProduk');
        echo view('components/admin/A_footer');

    }

    public function daftarTransaksi(){
        $data = [
            'title' => 'Daftar Transaksi'
        ];
        echo view('components/admin/A_header',$data);
        echo view('components/admin/A_sidebar');
        echo view('components/admin/A_topbar', $data);
        echo view('components/admin/A_transaksi');
        echo view('components/admin/A_footer');
    }

    public function daftarUser(){
        $data = [
            'title' => 'Daftar User'
        ];
        $userModel = new UserModel();
        $dataUser['users'] = $userModel->findAll();

        echo view('components/admin/A_header',$data);
        echo view('components/admin/A_sidebar');
        echo view('components/admin/A_topbar', $data);
        echo view('components/admin/A_daftarUser',$dataUser);
        echo view('components/admin/A_footer');
    }
}
