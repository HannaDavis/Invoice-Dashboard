<?php

use App\Http\Controllers\ClientController;
use App\Http\Controllers\InvoiceController;
use App\Http\Controllers\InvoiceExportController;
use App\Http\Controllers\InvoiceSearchController;
use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get(
    '/',
    function () {
        return Inertia::render(
            'Welcome',
            [
                'canLogin' => Route::has('login'),
                'canRegister' => Route::has('register'),
                'laravelVersion' => Application::VERSION,
                'phpVersion' => PHP_VERSION,
            ]
        );
    }
);


Route::middleware(['auth', 'verified'])->group(
    function () {
        Route::get('/clients', [ClientController::class, 'index'])->name('clients');
        Route::post('/invoice/update/{invoice}', [InvoiceController::class, 'update']);
        Route::get('/dashboard', [InvoiceController::class, 'index'])->name('dashboard');
        Route::get('/invoices', [InvoiceController::class, 'index'])->name('invoices');
        Route::get('/invoices/create', [InvoiceController::class, 'create']);
        Route::post('/invoice/store', [InvoiceController::class, 'store']);
        Route::get('/invoices/{invoice}', [InvoiceController::class, 'show'])->name('invoice.show');
        Route::get('/invoice/edit/{invoice}', [InvoiceController::class, 'edit']);
        Route::get('/invoice/edit/{invoice}', [InvoiceController::class, 'edit']);
        Route::get('/invoices/{invoice}', [InvoiceController::class, 'show']);
        Route::post('/invoice/store', [InvoiceController::class, 'store']);
        Route::get('/invoices/create', [InvoiceController::class, 'create']);

        Route::get('/search', [InvoiceSearchController::class, 'search'])->name('search');
        Route::get('/invoices', [InvoiceController::class, 'index'])->name('invoices');
        Route::get('/dashboard', [InvoiceController::class, 'index'])->name('dashboard');
        Route::get('/invoices/export/{invoice}', [InvoiceExportController::class, 'exportPdf']);
    }
);


require __DIR__ . '/auth.php';
