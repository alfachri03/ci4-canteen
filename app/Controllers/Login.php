<?php

namespace App\Controllers;
use App\Models\Account;
use App\Models\Pengguna;
use App\Controllers\BaseController;


class Login extends BaseController
{

    private Account $modelAcc;     
    private Pengguna $modelPengguna;
    
    public function __construct()
    {
        $this->modelAcc = new Account();
        $this->modelPengguna = new Pengguna();
    }

    public function index()
    {        
        return view('loginPage');
    }

    public function auth()
    {                
        $user = htmlspecialchars((string)$this->request->getPost('user_email'));
        $pass = htmlspecialchars((string)$this->request->getPost('user_pass'));        
        $data = $this->modelPengguna->where('email', $user)->first();         
        if(empty($data)){
            session()->setFlashdata('message', 'Username atau Password Salah');
            return redirect()->to('/');            
        }
        $dataAkun = $this->modelAcc->where('id', $data['acc_id'])->first(); 
        if($dataAkun['pass']!=$pass){
            session()->setFlashdata('message', 'Username atau Password Salah');
            return redirect()->to('/');
        }                
               
        session()->set('id',$data['acc_id']);        
        session()->set('role',$dataAkun['is_admin']);        
        return redirect('Home');
    }

    public function regis()
    {
        return view('regis');
    }

}
