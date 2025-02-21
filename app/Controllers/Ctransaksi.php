<?php

namespace App\Controllers;

use App\Helpers\PdfHelper;
use App\Controllers\BaseController;
use App\Database\Migrations\Produk;
use CodeIgniter\Controller;
use App\Models\Transaksi;
use App\Models\Pengguna;
use Dompdf\Dompdf;

class Ctransaksi extends BaseController
{
    protected $db;
    protected $id;
    protected Transaksi $modelTransaksi; 
    protected Dompdf $modelPDF;   
    protected Pengguna $modelPengguna;    
    
    public function __construct()
    {
        $this->db = \Config\Database::connect();
        $this->id = htmlspecialchars(session()->id); 
        $this->modelPDF = new Dompdf();
        $this->modelTransaksi = new Transaksi();
        $this->modelPengguna = new Pengguna();        
    }
    public function index($transactionID)
    {                
        $db = $this->modelTransaksi
        ->select('*')
        ->select('pengguna.*')
        ->select('produk.*')
        ->select('pengguna.name AS nama_user')
        ->join('pengguna','pengguna.acc_id=transaksi.acc_id')
        ->join('produk','transaksi.product_id=produk.product_id')
        ->where('transaksi.transaction_id',$transactionID)
        ->where('transaksi.acc_id',$this->id)->findAll();
        $data = [  
            'active' => $this->modelPengguna->where('acc_id',$this->id)->first(),       
            'pageName' => 'Transaction',
            'data' => $db            
        ];
        return $this->loadTemplate('menu/transaksi', $data);        
    }

    public function CetakPDF($trx_id)
    {
        $db = $this->modelTransaksi
        ->select('*')
        ->select('pengguna.*')
        ->select('produk.*')
        ->select('pengguna.name AS nama_user')
        ->join('pengguna','pengguna.acc_id=transaksi.acc_id')
        ->join('produk','transaksi.product_id=produk.product_id')
        ->where('transaksi.transaction_id',$trx_id)
        ->where('transaksi.acc_id',$this->id)->findAll();
        $send = [  
            'active' => $this->modelPengguna->where('acc_id',$this->id)->first(),       
            'pageName' => 'Transaction',
            'data' => $db            
        ];
        // return $this->loadTemplate('menu/transaksi', $data);            
        $html = view('menu/pdf/transaksiPDF', $send);
    
        // Nama dan lokasi file PDF yang dihasilkan
        $filename = WRITEPATH . 'trx-'.$trx_id.'.pdf';
        
        // Memanggil fungsi generatePdf() untuk mencetak PDF
        PdfHelper::generatePdf($html, $filename);
    
        // Setelah mencetak PDF, Anda dapat melakukan respons ke pengguna atau melakukan tindakan lain sesuai kebutuhan Anda
       
        // Mengatur header respons agar browser membuka PDF
        header('Content-Type: application/pdf');
        header('Content-Disposition: inline; filename="' . $filename . '"');
        header('Content-Length: ' . filesize($filename));
        
        // Membaca dan mengirimkan isi file PDF ke output
        readfile($filename);
        exit();
    }    

    public function history()
    {
        $db = $this->modelTransaksi
        ->select('transaction_id')
        ->select('acc_id')
        ->select('total_price')
        ->select('created_at')
        ->groupBy('transaction_id')                
        ->where('acc_id', $this->id)        
        ->findAll();
        $data = 
        [
            'active' => $this->modelPengguna->where('acc_id',$this->id)->first(),
            'pageName' => 'Riwayat Pembelian',
            'data' => $db
        ];
        return $this->loadTemplate('menu/history', $data);
    }
}
