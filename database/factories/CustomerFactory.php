<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class CustomerFactory extends Factory
{
    public function definition(): array
    {
        return [
            'Name' => 'حسین',
            'Phone' => '0700000000',
            'Add' => 'کابل',
            'DateOfJoin' => '2024-01-01',
            'DateOfSeparate' => null,
            'NID' => 123456789,
            'NidPhoto' => 'nid_default.jpg',
            'Level' => 1, // Upper
            'CustRole' => 'کمپنی',
        ];
    }
}
