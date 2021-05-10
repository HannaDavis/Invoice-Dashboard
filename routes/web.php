<?php

use App\Http\Controllers\ClientController;
use App\Http\Controllers\InvoiceController;
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

Route::get('/dashboard', [InvoiceController::class, 'index'])
    ->middleware(['auth', 'verified'])
    ->name('dashboard');

Route::get('/invoices', [InvoiceController::class, 'index'])
    ->middleware(['auth', 'verified'])
    ->name('invoices');

Route::get('/invoices/create', [InvoiceController::class, 'create'])
    ->middleware(['auth', 'verified']);

Route::post('/invoice/store', [InvoiceController::class, 'store'])
    ->middleware(['auth', 'verified']);

Route::get('/invoices/{invoice}', [InvoiceController::class, 'show'])
    ->middleware(['auth', 'verified']);

Route::get('/invoice/edit/{invoice}', [InvoiceController::class, 'edit'])
    ->middleware(['auth', 'verified']);

Route::post('/invoice/update/{invoice}', [InvoiceController::class, 'update'])
    ->middleware(['auth', 'verified']);

Route::get('/clients', [ClientController::class, 'index'])->name('clients')
    ->middleware(['auth', 'verified']);



require __DIR__ . '/auth.php';
