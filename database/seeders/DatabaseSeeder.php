<?php

namespace Database\Seeders;

use App\Models\Accountant;
use App\Models\Client;
use App\Models\Invoice;
use App\Models\User;
use Database\Factories\ClientFactory;
use Database\Factories\InvoiceFactory;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {

        User::factory()->create(
            [
                'name' => 'Hanna',
                'email' => 'hanna.davis.mail@gmail.com'
            ]
        );

        Client::factory(20)->create();

        Invoice::factory(100)->create();

        Accountant::factory(5)->create();

    }
}
