<?php

namespace App\Controllers;

class Home extends BaseController
{
    public function index()
    {   
        $data = [
            'title' => 'Home | Toko Buah Rizal'
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
    }
}
