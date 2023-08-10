<?php

namespace App\Models;

use CodeIgniter\Model;

class Cart extends Model
{
    protected $DBGroup          = 'default';
    protected $table            = 'cart';
    protected $primaryKey       = 'id';
    protected $useAutoIncrement = true;
    protected $returnType       = 'array';
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;
    protected $allowedFields    = ['user_id', 'produk_code', 'quantity'];

    // Dates
    protected $useTimestamps = true;
    protected $dateFormat    = 'datetime';
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';
    protected $deletedField  = 'deleted_at';

    // Validation
    protected $validationRules      = [];
    protected $validationMessages   = [];
    protected $skipValidation       = false;
    protected $cleanValidationRules = true;

    // Callbacks
    protected $allowCallbacks = true;
    protected $beforeInsert   = [];
    protected $afterInsert    = [];
    protected $beforeUpdate   = [];
    protected $afterUpdate    = [];
    protected $beforeFind     = [];
    protected $afterFind      = [];
    protected $beforeDelete   = [];
    protected $afterDelete    = [];

    public function getCartByUserId($id)
    {
        return $this->where('user_id', $id)->findAll();
    }
    public function getProductByCode($produk_code)
    {
        return $this->db->table('produk')->where('produk_code', $produk_code)->get()->getRowArray();
    }
    public function removeCart($id)
    {
        return $this->where('id', $id)->delete();
    }
    public function updateCartQuantity($id, $newQuantity)
    {
        // Retrieve the cart item
        $cartItem = $this->find($id);

        if ($cartItem) {
            $data = [
                'quantity' => $newQuantity,
            ];

            // Update the cart item with new quantity
            $this->update($id, $data);
        }
    }
}
