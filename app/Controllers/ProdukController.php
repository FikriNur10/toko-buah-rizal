<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\Produk;
use App\Models\UserModel;
use App\Models\Cart;

class ProdukController extends BaseController
{
    
    public function store()
    {
        $productModel = new Produk();

        // Ensure the form submission method is POST
        if ($this->request->getMethod() === 'post') {
            // Get the image file from the file input field
            $productImage = $this->request->getFile('product_image');

            // Check if the image file is uploaded successfully
            if ($productImage->isValid() && !$productImage->hasMoved()) {
                // Get the new file name with a unique identifier
                $newName = $productImage->getRandomName();

                // Move the uploaded file to the desired directory
                $productImage->move(ROOTPATH . 'public/uploads', $newName);

                // Get other form data and store it in the $data array
                $data = [
                    'product_code' => $this->request->getPost('product_code'),
                    'product_name' => $this->request->getPost('product_name'),
                    'product_price' => $this->request->getPost('product_price'),
                    'product_description' => $this->request->getPost('product_description'),
                    'product_stock' => $this->request->getPost('product_stock'),
                    'product_image' => $newName, // Store the image file name in the database
                ];

                // Save the product data to the database using the model
                $productModel->insert($data);

                // Redirect to a success page or do something else
                return redirect()->to('/dashboard/produk')->with('success', 'Product added successfully.');
            }
        }

        // Redirect to the form page if the form submission method is not POST
        return redirect()->back()->withInput()->with('error', 'Failed to add product. Please try again.');
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

    public function addCart(){
        $cartModel = new Cart();
        $data = [
            'user_id' => $this->request->getPost('user_id'),
            'product_code' => $this->request->getPost('product_code'),
            'cart_qty' => $this->request->getPost('cart_qty'),
        ];
        $cartModel->insert($data);
        return redirect()->to('/keranjang')->with('success', 'Product added to cart successfully.');
    }
}
