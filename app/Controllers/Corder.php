<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Controllers\Ccart;
use App\Models\Transaksi;

class Corder extends BaseController
{
    protected Transaksi $modelTransaction;
    protected CCart $modelCart;

    public function __construct()
    {
        $this->modelTransaction = new Transaksi();
        $this->modelCart = new Ccart();

    }

    public function add()
    {
        $user_id = $this->request->getPost('id');
        $totalPrice = $this->request->getPost('totalPrice'); 
        //insert ke table transaksi
        $transactionID = $this->modelTransaction->insertTransaction($user_id,$totalPrice);        
        // Hapus yang ada di table keranjang
        $this->modelCart->deleteCart($user_id);
        return redirect()->to("transaction/$transactionID");
    }
}
