<?php

namespace App\Observers;

use App\Models\Invoice;

class InvoiceObserver
{
    public $afterCommit = true;

    public function created(Invoice $invoice)
    {

    }
}
