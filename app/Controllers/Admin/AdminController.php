<?php

namespace App\Controllers\Admin;

// Helper pdf
use App\Helpers\PdfHelper;
//Model Database
use App\Models\Account;
use App\Models\Transaksi;
use App\Models\ProdukModel;
use App\Models\Pengguna;
use App\Models\Cart;

use App\Controllers\BaseController;
use App\Database\Migrations\Produk;

class AdminController extends BaseController
{

    protected Account $modelAccount;
    protected Transaksi $modelTransaksi;
    protected ProdukModel $modelProduk;
    protected Pengguna $modelPengguna;
    protected Cart $modelCart;
    protected $id;

    public function __construct()
    {        
         $this->modelAccount = new Account();
         $this->modelTransaksi = new Transaksi();
         $this->modelProduk = new ProdukModel();
         $this->modelPengguna = new Pengguna();
         $this->modelCart = new Cart();
         $this->id = session()->id;         
    }

    public function laporanPenjualan()
    {
        $dbAll = $this->modelTransaksi
        ->select('*')
        ->select('pengguna.*')
        ->select('produk.*')
        ->join('pengguna','pengguna.acc_id=transaksi.acc_id')
        ->join('produk','transaksi.product_id=produk.product_id')        
        ->groupBy('transaction_id')        
        ->findAll();
        $dbTotalPenjualan = $this->modelTransaksi
        ->selectSum('total_price')
        ->selectCount('transaction_id')        
        ->orderBy('created_at','asc')        
        ->first();
        $data = [  
            'active' => $this->modelPengguna->where('acc_id',$this->id)->first(),       
            'pageName' => 'Laporan Penjualan',
            'data' => $dbAll,
            'totalPenjualan' => $dbTotalPenjualan
        ];
        return $this->loadTemplate('menu/admin/salesReport', $data);        
    }

    public function detailLaporan($id)
    {
        $db = $this->modelTransaksi
        ->select('*')
        ->select('pengguna.*')
        ->select('produk.*')
        ->select('pengguna.name AS nama_user')
        ->join('pengguna','pengguna.acc_id=transaksi.acc_id')
        ->join('produk','transaksi.product_id=produk.product_id')        
        ->where('transaction_id', $id)          
        ->findAll();
        $dbTotalPenjualan = $this->modelTransaksi
        ->select('total_price')
        ->selectCount('transaction_id')        
        ->where('transaction_id', $id)        
        ->first();
        $data = [  
            'active' => $this->modelPengguna->where('acc_id',$this->id)->first(),       
            'pageName' => 'Detail Laporan',
            'data' => $db,
            'detail' => true,
            'totalPenjualan' => $dbTotalPenjualan          
        ];
        return $this->loadTemplate('menu/admin/salesReport', $data);        
    }

    public function listProduk()
    {
        $db = $this->modelProduk
        ->select('*')
        ->findAll();

        $dbTotalMakanan = $this->modelProduk
        ->selectCount('type')
        ->where('type', 'makanan')
        ->first();   
        $dbTotalMinuman = $this->modelProduk
        ->selectCount('type')
        ->where('type', 'minuman')
        ->first();
        $data = 
        [
            'active' => $this->modelPengguna->where('acc_id',$this->id)->first(),       
            'pageName' => 'Tambah Produk',
            'data' => $db,
            'detail' => true,
            'totalMakanan' => $dbTotalMakanan,
            'totalMinuman' => $dbTotalMinuman
        ];
        return $this->loadTemplate('menu/admin/addProduct', $data);
    }

    public function addProduct()
    {
        $data = 
        [
            'active' => $this->modelPengguna->where('acc_id',$this->id)->first(),       
            'pageName' => 'Tambah Produk',            
        ];
        return $this->loadTemplate('menu/admin/formproduct', $data);
    }

    public function insProduct()
    {           
        $filePict = $this->request->getFile('pict');                        
        //untuk upload file ke diektori   
        if ($this->request->getPost('type') == 'makanan') {
            $filePict->move('./assets/img/makanan/', $filePict->getName());                                      
        }else{
            $filePict->move('./assets/img/minuman/', $filePict->getName());                                      
        }      
       $data = 
       [
        'type' => $this->request->getPost('type'),
        'name' => $this->request->getPost('name'),
        'price' => $this->request->getPost('price'),
        'desc' => $this->request->getPost('desc'),
        'pict' => htmlspecialchars($filePict->getName())
       ];

       $this->modelProduk->ins($data);       
       return redirect()->to('admin/listProduk');
    }

    public function listAkun()
    {
        $db = $this->modelAccount
        ->select('*')
        ->select('pengguna.*')
        ->join('pengguna', 'akun.id=pengguna.acc_id')
        ->findAll();

        $dbTotaladmin = $this->modelAccount
        ->selectCount('is_admin')
        ->where('is_admin', 1)
        ->first();   
        $dbTotalPengguna = $this->modelAccount
        ->selectCount('is_admin')
        ->where('is_admin', 0)
        ->first();
        $data = 
        [
            'active' => $this->modelPengguna->where('acc_id',$this->id)->first(),       
            'pageName' => 'List User',
            'data' => $db,            
            'totalAdmin' => $dbTotaladmin,
            'totalPengguna' => $dbTotalPengguna
        ];
        return $this->loadTemplate('menu/admin/listAkun', $data);
    }

    public function editProduk($product_id)
    {
        $db = $this->modelProduk
        ->select('*')
        ->where('product_id', $product_id)
        ->first();
        $data = 
        [
            'active' => $this->modelPengguna->where('acc_id',$this->id)->first(),       
            'pageName' => 'Edit Produk',
            'data' => $db            
        ];
        return $this->loadTemplate('menu/admin/editProduct', $data);
    }

    public function submitEditProduk()
    {                          
        $id = ($this->request->getPost('id'));
        $insert = [            
            'name' => $this->request->getPost('name'),
            'type' => $this->request->getPost('type'),            
            'price' => (int)$this->request->getPost('price')            
        ];    
        $this->modelProduk->where('product_id', $id)->set($insert)->update();
        return redirect('admin/listProduk');
    }

    public function accSetting()
    {
        $db = $this->modelAccount->select()->where('id', $this->id)->first();
        $data = 
        [
            'data'  => $db,
            'active' => $this->modelPengguna->where('acc_id',$this->id)->first(),
            'pageName' => 'Pengaturan Akun'            
        ];

        return $this->loadTemplate('menu/formacc', $data);
    }

    public function submitAccSetting()
    {
        $dboldpass = $this->modelAccount->select('pass')->where('id', $this->id)->first()['pass'];

        $newpass = $this->request->getPost('newpassword');
        $oldpass = $this->request->getPost('oldpassword');
        $retype = $this->request->getPost('retype');

        if($newpass != $retype)
        {
            return redirect('admin/accSetting')->with('alert', 'Password Baru tidak sama');
        }elseif($oldpass != $dboldpass)
        {
            return redirect('admin/accSetting')->with('alert', 'Password lama salah');
        }
        $insert = 
        [
            'pass' => $this->request->getPost('newpassword')
        ];
        $this->modelAccount->where('id', $this->id)->set($insert)->update();
        return redirect('admin/accSetting')->with('success', 'Password Berhasil Diubah');
    }

    public function removeProduct($product_id)
    {
        $this->modelProduk->where('product_id', $product_id)->delete();

        return "<script>alert('Berhasil Menghapus Produk!');"."window.history.back();"."</script>";  
    }

    public function removeUser($id)
    {
        //delete dari table pengguna/user
        $this->modelPengguna->where('acc_id', $id)->delete();
        //delete dari table akun
        $this->modelAccount->where('id', $id)->delete();
        return redirect('admin/listAkun');
    }

    public function role($id, $role)    
    {              
        if ($role == 1) {
            $this->modelAccount->where('id', $id)->set(['is_admin' => 1])->update();
        }else{
            $this->modelAccount->where('id', $id)->set(['is_admin' => 0])->update();
        }

        return redirect('admin/listAkun');
    }


}
