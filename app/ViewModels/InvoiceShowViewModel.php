<?php

namespace App\ViewModels;

use App\Models\Accountant;
use App\Models\Invoice;
use Spatie\ViewModels\ViewModel;

class InvoiceShowViewModel extends ViewModel
{
    public $accountants;
    public $invoice;

    public function __construct(Invoice $invoice)
    {
        $this->invoice = Invoice::with('client', 'accountant')->where('id', $invoice->id)->first();
        $this->accountants = Accountant::all();
    }
}
