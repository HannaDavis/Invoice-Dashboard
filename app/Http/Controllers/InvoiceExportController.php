<?php

namespace App\Http\Controllers;

use App\Models\Invoice;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade as PDF;

class InvoiceExportController extends Controller
{
    public function exportPdf(Invoice $invoice)
    {
        $pdf = PDF::loadView('pdf_view', ['invoice' => $invoice, 'client' => $invoice->client]);
        return $pdf->download('pdf_file.pdf');
    }
}
