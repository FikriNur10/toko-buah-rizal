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
        echo view('index');
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
 
}
