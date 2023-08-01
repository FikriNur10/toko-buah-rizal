<?php

namespace App\Controllers;
use App\Controllers\Login;
class Home extends BaseController
{
    public function index()
    {   
        $data = [
            'title' => 'Home | Toko Buah Rizal',
            'Sesson' => session()->get('isLoggedIn')
        ];
        echo view('components/navbar', $data);
        return view('index');
        echo view('components/footer');

    }

    public function shop()
    {   
        echo view('components/navbar');
        echo view('pages/shop');
        echo view('components/footer');

    }

    public function about()
    {   
        echo view('components/navbar');
        echo view('pages/about');
        echo view('components/footer');

    }

    public function contact()
    {   
        echo view('components/navbar');
        echo view('pages/contact');
        echo view('components/footer');

    }

    public function cart()
    {   
        echo view('components/navbar');
        echo view('pages/cart');
    }

    public function shop_single()
    {   
        echo view('components/navbar');
        echo view('pages/shop_single');

    } public function confirm_payment()
    {   
        echo view('components/navbar');
        echo view('pages/confirm_payment');
    }
}
