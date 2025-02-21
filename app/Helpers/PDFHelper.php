<?php

namespace App\Helpers;

use Dompdf\Dompdf;

class PdfHelper
{
    public static function generatePdf($html, $filename)
    {
        $dompdf = new Dompdf();
        $dompdf->loadHtml($html);
        $dompdf->render();
        
        $output = $dompdf->output();
        file_put_contents($filename, $output);
    }
}
