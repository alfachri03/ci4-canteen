<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\ProdukModel;
use App\Models\Pengguna;
use App\Models\Cart;    
use App\Models\Vocer;

class Ccart extends BaseController
{    
    protected Pengguna $modelPengguna;
    protected Cart $modelCart;
    protected Vocer $modelVocer;
    protected string $id;    
    protected $db;
    protected $voceraktif;

    public function __construct()
    {        
        $this->db = \Config\Database::connect();
        $this->id = htmlspecialchars(session()->id);        
        $this->modelPengguna = new Pengguna();
        $this->modelCart = new Cart();
        $this->modelVocer = new Vocer();        
    }

    public function index()
    {                        
        $query   = $this->db->query("SELECT * FROM keranjang JOIN produk on keranjang.product_id=produk.product_id WHERE acc_id='$this->id'");
        $results = $query->getResultArray();     
        $vocer = $this->modelVocer->findAll();        
        $dataDB = $this->modelPengguna->where('acc_id',$this->id)->first();        
        $data = [            
            'active' => $dataDB,
            'pageName' => 'WRN | Cart',
            'data' => $results,
            'vocer' => $vocer,
            'vocerActive' => $this->voceraktif
        ];
        return $this->loadTemplate('menu/cart', $data);
    }

    public function addItems()
    {         
        $product_id = $this->request->getPost('product_id');
        $qty = $this->request->getPost('qty');
        $data = [
            'product_id' => $product_id,
            'qty' => $qty
        ];
        $this->modelCart->insertCart($this->id,$data);             
        return "<script>alert('Input cart berhasil');"."window.history.back();"."</script>";            
    }

    public function deleteItems($idOrder)
    {
        $order_id = htmlspecialchars($idOrder);
        $acc_id = $this->id;
        $this->modelCart->deleteItem($order_id,$acc_id);
        return "<script>window.history.back();</script>";            
    }

    public function addVoucher($voucher_key)
    {        
        $voucher = $this->modelVocer->where('voucher_key', $voucher_key)->first();        
        $this->voceraktif = $voucher;
        return $this->index();     
    }

    public function deleteCart($acc_id)
    {
        return $this->modelCart->deleteCart($acc_id);
    }

}
