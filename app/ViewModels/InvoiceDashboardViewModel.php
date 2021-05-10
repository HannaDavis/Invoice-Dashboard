<?php

namespace App\ViewModels;

use App\Models\Invoice;
use Spatie\ViewModels\ViewModel;

class InvoiceDashboardViewModel extends ViewModel
{
    public $invoices;

    public function __construct()
    {
        $this->invoices = Invoice::with('client')->paginate(10);
    }
}
