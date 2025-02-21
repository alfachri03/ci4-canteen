<?php

namespace App\Controllers;

// Model Database
use App\Models\Pengguna;
use App\Models\Account;
use App\Models\ProdukModel;
use App\Controllers\BaseController;


class Home extends BaseController
{
    protected Pengguna $modelPengguna;
    protected ProdukModel $modelProduk;
    protected Account $modelAccount;
    protected $id;    

    public function __construct()
    {
        $this->modelPengguna = new Pengguna();
        $this->modelProduk = new ProdukModel();
        $this->modelAccount = new Account();
        $this->id = htmlspecialchars(session()->id);  
    }


    public function index()
    {                      
        $tempData = [
            'active' => $this->modelPengguna->where('acc_id',$this->id)->first(),
            'all'   => $this->modelPengguna->findAll(),
            'produk' => $this->modelProduk->getAll(),
            'pageName' => 'Waroeng Rasa Nusantara'
        ];  
        session()->set('user_name',$this->id);        
        return $this->loadTemplate('menu/dashboard', $tempData);
    }

    public function editProfile()
    {
        $profile = $this->modelPengguna->where('acc_id', $this->id)->first();
        $data = 
        [
            'active' => $profile,
            'pageName' => 'WRN | Profile Edit'
        ];
        return $this->loadTemplate('account/editAccount', $data);
    }

    public function submitedit()
    {        
        $id = $this->request->getPost('acc_id');
        $filePict = $this->request->getFile('pict');                           
        $filePict->move('./assets/img/profile-pict/', $filePict->getName());                                    
        $data = 
        [
            'name' => $this->request->getPost('name'),
            'email' => $this->request->getPost('email'),
            'phone' => $this->request->getPost('phone'),
            'address' => $this->request->getPost('address'),
            'pict' => htmlspecialchars($filePict->getName())
        ];

        $this->modelPengguna->where('acc_id', $id)->set($data)->update();
        return redirect()->to('Home');
    }

    public function regis()
    {
        return view('regis');
    }

    public function submitRegis()
    {        
        $filePict = $this->request->getFile('pict');                           
        $filePict->move('./assets/img/profile-pict/', $filePict->getName());                                    
        $id = $this->generateUniqueID();        
        $data = 
        [
            'acc_id' => $id,
            'name' => $this->request->getPost('name'),
            'email' => $this->request->getPost('email'),
            'phone' => $this->request->getPost('phone'),
            'address' => $this->request->getPost('address'),
            'pict' => htmlspecialchars($filePict->getName())
        ];

        $dataAcc = 
        [
            'id' => $id,
            'pass' => $this->request->getPost('pass'),
            'is_admin' => false
        ];

        $this->modelAccount->insert($dataAcc);
        $this->modelPengguna->insert($data);
        return redirect('/');
    }

    public function signout()
    {
        session()->remove('id');
        return redirect('Login');
    }

    // fungsi gejnerate id user saat regis
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
        $data = $this->modelAccount->select('id')->get()->getResult(); // Daftar ID yang sudah digunakan
        $unValidId = [];
        foreach ($data as $value) {
            $unValidId [] = $value->id;
        }
    
        return !in_array($id,$unValidId);
    }
}
