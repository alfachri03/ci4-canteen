<?php

namespace App\Models;

use CodeIgniter\Model;

class Transaksi extends Model
{
    protected $DBGroup          = 'default';
    protected $table            = 'transaksi';    
    protected $returnType       = 'array';
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;
    protected $allowedFields    = ['transaction_id','acc_id','product_id','product_qty', 'total_price'];

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

    function generateUniqueTrxID() {
        $characters = 'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789';
        $length = 15;
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
        $data = $this->db->table('transaksi')->select('acc_id')->get()->getResult(); // Daftar ID yang sudah digunakan
        $unValidId = [];
        foreach ($data as $value) {
            $unValidId [] = $value->acc_id;
        }
    
        return !in_array($id,$unValidId);
    }

    public function insertTransaction($acc_id,$totalPrice)
    {
        $transaction_id = htmlspecialchars($this->generateUniqueTrxID());
        $this->db->query("INSERT INTO transaksi (transaction_id, acc_id, product_id,product_qty,total_price)
        SELECT '$transaction_id', acc_id, product_id,product_qty,$totalPrice
        FROM keranjang WHERE acc_id='$acc_id'");
        return $transaction_id;
    }


}
