<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Invoices>
 */
class InvoicesFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $status = $this->faker->randomElement(['B', 'P', 'V']);

        return [
            'customer_id' => $this->faker->numberBetween(1, 10),
            'amount' => $this->faker->numberBetween(100, 1000),
            'status' => $status,
            'billed_at' => $this->faker->dateTime(),
            'paid_dated' => $status === 'P' ? $this->faker->dateTime() : null
        ];
    }
}