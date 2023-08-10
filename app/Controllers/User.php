<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\Produk;
use App\Models\Cart;
use App\Models\Payments;
use App\Models\UserModel;
class User extends BaseController
{
    
    public function cart()
    {   
        // Ambil user ID dari sesi atau data yang sesuai
    $id = session()->get('id'); // Gantilah 'user_id' dengan sesi yang sesuai

    $cartModel = new Cart();
        $cartItems = $cartModel->getCartByUserId($id);

        // Mendapatkan detail produk untuk setiap produk_code
        foreach ($cartItems as &$item) {
            $productDetail = $cartModel->getProductByCode($item['produk_code']);
            $item['product'] = $productDetail;
        }

        $data['cartItems'] = $cartItems;

        echo view('components/navbar');
        return view('pages/cart', $data);
    }
    public function updateCart($id){
        $cartModel = new Cart(); // Adjust this to match your Cart model instantiation

        $newQuantity = $this->request->getPost('quantity'); // Get the updated quantity from the form

        if ($newQuantity >= 0) {
            $cartModel->updateCartQuantity($id, $newQuantity);

            // Redirect back to the cart page
            return redirect()->to('/keranjang');
        }
    }

    public function removeFromCart($id)
    {
        $cartModel = new Cart();
        $cartModel->removeCart($id);

        return redirect()->to('/keranjang')->with('success', 'Product removed from cart successfully.');
    }

    public function productSingel()
    {   
        $productModel = new Produk();
        $dataProduct['product'] = $productModel->findAll();
        echo view('components/navbar');
        echo view('pages/produkPage',$dataProduct);

    }

    public function userTransaction(){
        $paymentModel = new Payments();
        $id = session()->get('id');
        $data['payments'] = $paymentModel->where('user_id', $id)->findAll();
        
    }

    public function setting(){
        $userModel = new UserModel();
        $id = session()->get('id');
        $data['user'] = $userModel->where('id', $id)->findAll();


        echo view('components/user/U_header');
            echo view('components/user/U_sidebar');
            echo view('components/user/U_topbar');
        echo view('components/user/U_settingDash',$data);
        echo view('components/user/U_footer');
    }
}
