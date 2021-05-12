<?php

namespace Tests\Unit;

use App\Models\Client;
use App\Models\Invoice;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class PDFControllerTest extends TestCase
{
    use RefreshDatabase;

    /**
     * @test
     */
    public function pdf_returned_when_invoice_pdf_export_clicked()
    {
        $user = User::factory()->create();
        $client = Client::factory()->create();

        $invoice = Invoice::create(
            [
                'client_id' => $client->id,
                'description' => 'testing',
                'subtotal' => 100,
                'tax' => 8,
                'total' => 108
            ]
        );


        $response = $this->actingAs($user)->get('/invoices/export/' . $invoice->id);
        $response->assertSuccessful();
        $this->assertTrue($response->headers->get('content-type') == 'application/pdf');
    }
}
