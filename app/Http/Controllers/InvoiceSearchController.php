<?php

namespace App\Http\Controllers;

use App\Models\Invoice;
use Illuminate\Http\Request;
use Inertia\Inertia;
use Inertia\Response;

class InvoiceSearchController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function search(Request $request): Response
    {
        $keyword = request()->input('keyword');
        if ($keyword) {
            $invoices = Invoice::with('client', 'accountant')
                ->where('description', 'LIKE', $keyword)
                ->orderByDesc('id')
                ->paginate(10);
        } else {
            $invoices = Invoice::with('client', 'accountant')
                ->orderByDesc('id')
                ->paginate(10);
        }


         return Inertia::render('InvoiceDashboard', $invoices);
    }
}
