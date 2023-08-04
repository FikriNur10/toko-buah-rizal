<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\Produk;
class User extends BaseController
{
    
    public function cart()
    {   
        echo view('components/navbar');
        echo view('pages/cart');
    }

    public function productSingel()
    {   
        $productModel = new Produk();
        $dataProduct['product'] = $productModel->findAll();
        echo view('components/navbar');
        echo view('pages/produkPage',$dataProduct);

    } public function confirm_payment()
    {   
        echo view('components/navbar');
        echo view('pages/confirm_payment');
    }
}
