<?php
 
namespace App\Controllers;
 
use App\Controllers\BaseController;
 
class Dashboard extends BaseController
{
    public function index()
    {
        if (session()->get('role') == 'user') {
            echo view('components/user/U_header');
            echo view('components/user/U_sidebar');
            echo view('components/user/U_topbar');
            echo view('components/user/U_orderDash');
            echo view('components/user/U_footer');


        } else if (session()->get('role') == 'admin') {
            $data = [
                'title' => 'Dashboard'
            ];
            echo view('components/user/U_header',$data);
            echo view('components/admin/A_sidebar');
            echo view('components/admin/A_topbar', $data);
            echo view('components/admin/A_orderDash');
            echo view('components/admin/A_footer');
        }
        
        return view('pages/dashboard');
    }

    // for AdminController
    public function productDash(){
        $data = [
            'title' => 'Product'
        ];
        echo view('components/user/U_header',$data);
        echo view('components/admin/A_sidebar');
        echo view('components/admin/A_topbar', $data);
        echo view('components/admin/A_produkDash');
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
        echo view('components/user/U_header',$data);
        echo view('components/admin/A_sidebar');
        echo view('components/admin/A_topbar', $data);
        // echo view('components/admin/A_tambahData');
        echo view('components/admin/A_footer');
    }
}