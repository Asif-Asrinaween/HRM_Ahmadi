<?php

namespace Database\Seeders;

use App\Models\Customer;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class CustomerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Customer::create(['Name' => 'Ahmad', 'FatherName' => 'Ahmad', 'Phone' => '009345876658', 'Email' => 'ahmad@yahoo.com', 'NID' => '64683638', 'Add' => 'kabul', 'CustType' => 'Accounter',]);
    }
}
