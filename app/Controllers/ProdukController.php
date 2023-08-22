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
            $productImage = $this->request->getFile('image');

            // Check if the image file is uploaded successfully
            if ($productImage->isValid() && !$productImage->hasMoved()) {
                // Get the new file name with a unique identifier
                $newName = $productImage->getRandomName();

                // Move the uploaded file to the desired directory
                $productImage->move(ROOTPATH . 'public/uploads', $newName);

                // Get other form data and store it in the $data array
                $data = [
                    'produk_code' => $this->request->getPost('produk_code'),
                    'name' => $this->request->getPost('name'),
                    'price' => $this->request->getPost('price'),
                    'expiried_date' => $this->request->getPost('expiried_date'),
                    'stock' => $this->request->getPost('stock'),
                    'image' => $newName, // Store the image file name in the database
                    'deskripsi' => $this->request->getPost('deskripsi'),
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

    public function edit($produk_code)
    {
        $productModel = new Produk();

        $data['record'] = $productModel->getDataById($produk_code);
        $dataweb = [
            'title' => 'Edit Product'
        ];

        echo view('components/admin/A_header', $dataweb);
        echo view('components/admin/A_sidebar');
        echo view('components/admin/A_topbar', $dataweb);
        echo view('components/admin/A_editProduk', $data);
        echo view('components/admin/A_footer');
    }

    public function deleteProduk($id)
    {
        $productModel = new Produk();
        $productModel->deleteData($id);
        return redirect()->to('/dashboard/produk');
    }

    public function updateProduk()
    {
        $productModel = new Produk();
        $id = $this->request->getPost('produk_code');

        // Mengambil data produk berdasarkan ID
        $existingProduct = $productModel->find($id);

        $data = [
            'produk_code' => $this->request->getPost('produk_code'),
            'name' => $this->request->getPost('name'),
            'price' => $this->request->getPost('price'),
            'expiried_date' => $this->request->getPost('expiried_date'),
            'stock' => $this->request->getPost('stock'),
            'image' => $existingProduct['image'], // Menyimpan nama file gambar yang sudah ada di database
        ];

        // Mengelola gambar baru (jika di-upload)
        $newImage = $this->request->getFile('image');
        if ($newImage->isValid() && !$newImage->hasMoved()) {
            $newImageName = $newImage->getRandomName();
            $newImage->move(ROOTPATH . 'public/uploads', $newImageName);
            $data['image'] = $newImageName;
        }

        $productModel->updateData($id, $data);
        return redirect()->to('/dashboard/produk')->with('success', 'Product updated successfully.');
    }


    public function addCart()
    {
        $cartModel = new Cart();
        $data = [
            'user_id' => $this->request->getPost('id'),
            'produk_code' => $this->request->getPost('produk_code'),
            'quantity' => $this->request->getPost('quantity'),
        ];
        $cartModel->insert($data);
        return redirect()->to('/keranjang')->with('success', 'Product added to cart successfully.');
    }
}
