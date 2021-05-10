<?php

namespace Database\Factories;

use App\Models\Client;
use App\Models\Invoice;
use Illuminate\Database\Eloquent\Factories\Factory;

class InvoiceFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Invoice::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $subtotal = $this->faker->numberBetween(100, 1000);
        return [
            'client_id' => $this->faker->numberBetween(1, 20),
            'description' => $this->faker->sentence(),
            'subtotal' => $subtotal,
            'tax' => $subtotal * 0.08,
            'total' => $subtotal * 1.08,
            'created_at' => now(),
            'updated_at' => now()
        ];
    }
}
