<?php

namespace App\ViewModels;

use App\Models\Invoice;
use Illuminate\Support\Facades\Cache;
use Spatie\ViewModels\ViewModel;

class InvoiceDashboardViewModel extends ViewModel
{
    public $invoices;


    public function __construct()
    {

        $invoices = Cache::remember('invoices', 5, function(){
            return Invoice::with('client', 'accountant')->orderByDesc('id')->paginate(10);
        });
        $this->invoices = $invoices;
    }
}
