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
}
