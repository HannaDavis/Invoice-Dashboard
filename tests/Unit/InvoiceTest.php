<?php

namespace Tests\Feature;

use App\Models\Client;
use App\Models\Invoice;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class InvoiceTest extends TestCase
{

    use RefreshDatabase;


    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_example()
    {
        $user = User::factory()->create();
        $response = $this->actingAs($user)->get('/dashboard');
        $response->assertStatus(200);
    }

    /**
     * @test
     *
     * @return void
     */
    public function a_user_can_see_invoices()
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
        $response = $this->actingAs($user)->get('/dashboard');
        $response->assertSee($invoice->description);
        $response->assertSee($invoice->subtotal);
        $response->assertSee($invoice->tax);
        $response->assertSee($invoice->total);
    }

    /**
     * @test
     *
     * @return void
     */
    public function a_user_can_see_an_invoice()
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
        $response = $this->actingAs($user)->get('/invoices/' . $invoice->id);
        $response->assertSee($invoice->description);
    }

    /**
     * @test
     *
     * @return void
     */
    public function a_user_can_create_an_invoice()
    {
        $originalInvoiceCount = Invoice::count();
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
        $this->post('/invoice/store', $invoice->toArray());
        $this->assertEquals(Invoice::count(), $originalInvoiceCount + 1);
    }

//    /**
//     * @test
//     *
//     * @return void
//     */
//    public function a_user_can_update_invoice()
//    {
//        $invoice = Invoice::factory()->create();
//        $invoice->client_id = 100;
//        $invoice->description = 'test description';
//        $invoice->subtotal = 2000;
//        $invoice->tax = 160;
//        $invoice->total = 2160;
//        $this->post('/invoices/update/' . $invoice->id, $invoice->toArray());
//        $this->assertDatabaseHas(
//            'invoices',
//            [
//                'client_id' => 100,
//                'description' => 'test description',
//                'subtotal' => 2000,
//                'tax' => 160,
//                'total' => 2160
//            ]
//        );
//    }


}
