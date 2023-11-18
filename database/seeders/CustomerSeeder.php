<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CustomerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        \App\Models\Customer::factory()
            ->count(25)
            ->hasInvoices(10)
            ->create();

        \App\Models\Customer::factory()
            ->count(100)
            ->hasInvoices(5)
            ->create();

        \App\Models\Customer::factory()
            ->count(100)
            ->hasInvoices(3)
            ->create();

        \App\Models\Customer::factory()
            ->count(100)
            ->hasInvoices(0)
            ->create();
    }
}