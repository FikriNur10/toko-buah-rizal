<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\Produk;
use App\Models\UserModel;
class ProdukController extends BaseController
{
    
    public function store()
    {
        $productModel = new Produk();

        $data = [
            'product_code' => $this->request->getPost('product_code'),
            'product_name' => $this->request->getPost('product_name'),
            'product_price' => $this->request->getPost('product_price'),
            'product_description' => $this->request->getPost('product_description'),
            'product_stock' => $this->request->getPost('product_stock'),
            'product_image' => $this->request->getPost('product_image'),
        ];

        $productModel->insert($data);

        return redirect()->to('/dashboard/produk/')->with('success', 'Product added successfully.');
    }

    public function edit($product_id)
    {
        $productModel = new Produk();

        $data = [
            'product' => $productModel->find($product_id),
        ];

        return view('components/admin/A_editProduk', $data);
    }

    public function deleteProduk(){
        $productModel = new Produk();
        $product_id = $this->request->getPost('product_id');
        $productModel->delete($product_id);
        return redirect()->to('/dashboard/produk/')->with('success', 'Product deleted successfully.');
    }
}
