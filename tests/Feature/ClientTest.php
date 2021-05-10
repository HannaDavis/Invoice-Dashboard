<?php

namespace Tests\Feature;

use App\Models\Client;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class ClientTest extends TestCase
{
    use RefreshDatabase;
    /**
     * @test
     */
    public function can_see_clients_when_visiting_client_dashboard()
    {
        $client = Client::factory()->create();
        $user = User::factory()->create();
        $response = $this->actingAs($user)->get(route('clients'));
        $response->assertStatus(200);
        $response->assertSee($client->name);
    }
}
