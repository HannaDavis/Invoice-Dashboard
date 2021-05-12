<?php

namespace App\Http\Controllers;

use App\Http\Requests\InvoiceFormRequest;
use App\Models\Invoice;
use App\ViewModels\InvoiceDashboardViewModel;
use App\ViewModels\InvoiceShowViewModel;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Inertia\Inertia;
use Inertia\Response;

class InvoiceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index(): Response
    {
        $viewModel = new InvoiceDashboardViewModel();
        return Inertia::render('InvoiceDashboard', $viewModel);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create(): Response
    {
        return Inertia::render('Invoice/EntryForm');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param InvoiceFormRequest $request
     * @return RedirectResponse
     */
    public function store(InvoiceFormRequest $request): RedirectResponse
    {
        $request->validated();
        Invoice::create($request->all());
        return Redirect::route('dashboard');
    }

    /**
     * Display the specified resource.
     *
     * @param Invoice $invoice
     * @return Response
     */
    public function show(Invoice $invoice)
    {
        $viewModel = new InvoiceShowViewModel($invoice);
        return Inertia::render('Invoice/ViewForm', $viewModel);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param Invoice $invoice
     * @return Response
     */
    public function edit(Invoice $invoice)
    {
        return Inertia::render('Invoice/UpdateForm', ['invoice' => $invoice]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param Request $request
     * @param Invoice $invoice
     * @return RedirectResponse
     */
    public function update(Request $request, Invoice $invoice): RedirectResponse
    {
        $invoice->update($request->all());
        return Redirect::to('invoices');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Invoice $invoice
     * @return \Illuminate\Http\Response
     */
    public function destroy(Invoice $invoice)
    {
        //
    }
}
