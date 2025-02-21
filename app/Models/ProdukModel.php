<?php

namespace App\Models;

use CodeIgniter\Model;

class ProdukModel extends Model
{
    protected $DBGroup          = 'default';
    protected $table            = 'produk';
    protected $primaryKey       = 'id';
    protected $useAutoIncrement = true;
    protected $returnType       = 'array';
    protected $useSoftDeletes   = false;    
    protected $allowedFields    = ['type', 'product_id', 'name', 'desc', 'price', 'pict'];

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

    function generateID() {
        $characters = '0123456789ABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $idLength = 7;
        $id = '';
    
        $charactersLength = strlen($characters);
        for ($i = 0; $i < $idLength; $i++) {
            $randomChar = $characters[rand(0, $charactersLength - 1)];
            $id .= $randomChar;
        }
    
        return $id;
    }

    public function getAll()
    {
        return $this->findAll();
    }

    public function getMakanan()
    {
        return $this->where('type', 'makanan')->findAll();
    }

    public function getMinuman()
    {
        return $this->where('type', 'minuman')->findAll();
    }

    public function ins(array $data)
    {        
        $id = $this->generateID();
        return $this->insert([
            'type' => $data['type'],
            'product_id' => $id,
            'name' => $data['name'],
            'desc' => $data['desc'],
            'price' => $data['price'],
            'pict' => $data['pict']
        ]);
    }

}
