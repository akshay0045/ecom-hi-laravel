<?php

namespace Database\Seeders;

use App\Models\UserAddress;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserAddressSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $address = [
            [
                'user_id' => 1,
                'address' => "10 Pavan Tirth Tenament, Chikhodra Chokadi, B/H Shubham Party Plot",
                'city' => 'Anand',
                'state' => "Gujarat",
                "zip_code" => "388320",
                "country" => "India",
                "mobile" => "9016475270"

            ],
            [
                'user_id' => 1,
                'address' => "Akhand Anand Sociaty, New Bus Stand, Bhalaj Road",
                'city' => 'Anand',
                'state' => "Gujarat",
                "zip_code" => "388320",
                "country" => "India",
                "mobile" => "9016475270"

            ]
        ];
        UserAddress::insert($address);
    }
}
