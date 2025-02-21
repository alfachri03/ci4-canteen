<?php

namespace App\Models;

use CodeIgniter\Model;
use CodeIgniter\Session\Session;

class Cart extends Model
{
    protected $session;
    protected $DBGroup          = 'default';
    protected $table            = 'keranjang';
    protected $allowedFields    = ['order_id','acc_id', 'product_id', 'product_qty'];

    // Dates
    protected $useTimestamps = false;
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

    function generateUniqueID() {
        $characters = 'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789';
        $length = 7;
        $uniqueID = '';
    
        do {
            $uniqueID = '';
            for ($i = 0; $i < $length; $i++) {
                $uniqueID .= $characters[rand(0, strlen($characters) - 1)];
            }
        } while (!$this->isUniqueID($uniqueID));
    
        return $uniqueID;
    }
    
    function isUniqueID($id) {
        // Logika untuk memeriksa keunikan ID di sini
        // Anda dapat mengubah bagian ini sesuai dengan kebutuhan Anda
        // Misalnya, memeriksa basis data atau daftar ID yang sudah digunakan
    
        // Contoh sederhana untuk memeriksa keunikan ID dengan daftar ID yang sudah digunakan
        $data = $this->db->table('keranjang')->select('order_id')->get()->getResult(); // Daftar ID yang sudah digunakan
        $unValidId = [];
        foreach ($data as $value) {
            $unValidId [] = $value->order_id;
        }
    
        return !in_array($id,$unValidId);
    }
    

    public function insertCart($id, array $data)
    {
        $ord_id = htmlspecialchars($this->generateUniqueID());
        $acc_id = htmlspecialchars($id);
        $prd_id = htmlspecialchars($data['product_id']);
        $prd_qty = htmlspecialchars($data['qty']);

        $arryData = [
            'order_id' => $ord_id,
            'acc_id' => $acc_id,
            'product_id' => $prd_id,
            'product_qty' => $prd_qty
        ];        
        $this->insert($arryData);             
    }

    public function deleteItem(string $order_id, string $acc_id)
    {
        $this->db->table($this->table)->where('order_id', $order_id)->where('acc_id',$acc_id)->delete();
    }

    public function deleteCart(string $acc_id)
    {
        $this->db->table($this->table)->where('acc_id',$acc_id)->delete();
    }
}
