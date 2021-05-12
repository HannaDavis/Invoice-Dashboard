<?php

namespace Tests\Unit;

use App\Models\Client;
use App\Models\Invoice;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class InvoiceExportTest extends TestCase
{
    use RefreshDatabase;

    private $user;
    private $client;
    private $invoice;

    protected function setUp(): void
    {
        parent::setUp();

        $this->user = User::factory()->create();
        $this->client = Client::factory()->create();
        $this->invoice = Invoice::create(
            [
                'client_id' => $this->client->id,
                'description' => 'testing',
                'subtotal' => 100,
                'tax' => 8,
                'total' => 108
            ]
        );
    }

    /**
     * @test
     */
    public function route_to_download_pdf_exists()
    {

        $response = $this->actingAs($this->user)->get('/invoices/export/1');
        $response->assertStatus(200);
    }
}
