<?php

namespace App\Http\Controllers;

use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Http\Request;
// use PDF;

class PDFController extends Controller
{
    // public function generate()
    // {
    //     $data = [
    //         // Your data to be passed to the PDF view
    //     ];
        
    //     $pdf = PDF::loadView('template_pdf', $data);

    //     return $pdf->download('generated-pdf.pdf');
    // }

    public function download() {
    $data = [
        [
            'quantity' => 1,
            'description' => '1 Year Subscription',
            'price' => '129.00'
        ]
    ];
 
    $pdf = Pdf::loadView('cart_test', ['data' => $data]);
 
    return $pdf->download();
    }

    function cek(){
        return view('cart_test');
    }

}
