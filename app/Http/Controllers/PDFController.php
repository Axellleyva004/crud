<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Casillas;
use Barryvdh\DomPDF\Facade as PDF;

class PDFController extends Controller
{
    public function generatepdf()
    {
        $casillas = Casillas::all();
        $pdf = PDF::loadView('casillas/index', ['casillas' => $casillas]);
        return $pdf->download('archivo.pdf');
    }
}
