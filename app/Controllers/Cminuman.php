<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\ProdukModel;
use App\Models\Pengguna;

class Cminuman extends BaseController
{
    protected ProdukModel $modelProduk;
    protected Pengguna $modelPengguna;

    public function __construct()
    {
        $this->modelProduk = new ProdukModel();
        $this->modelPengguna = new Pengguna();
    }

    public function index()
    {
        $id = htmlspecialchars(session()->id);        
        $data = [            
            'active' => $this->modelPengguna->where('acc_id',$id)->first(),
            'pageName' => 'WRN | Minuman',
            'data' => $this->modelProduk->getMinuman()
        ];        
        return $this->loadTemplate('menu/minuman', $data);
    }
}
