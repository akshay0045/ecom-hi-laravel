<?php

namespace Database\Seeders;

use App\Models\Product;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = [
            [
                'product_name' => 'Oppo mobile',
                "product_price" => "300",
                "product_description" => "A smartphone with 8gb ram and much more feature",
                "category_id" => "mobile",
                "product_gallary" => "https://assetscdn1.paytm.com/images/catalog/product/M/MO/MOBOPPO-A52-6-GFUTU6297453D3D253C/1592019058170_0..png"
            ],
            [
                'product_name' => 'Panasonic Tv',
                "product_price" => "400",
                "product_description" => "A smart tv with much more feature",
                "category_id" => "tv",
                "product_gallary" => "https://i.gadgets360cdn.com/products/televisions/large/1548154685_832_panasonic_32-inch-lcd-full-hd-tv-th-l32u20.jpg"
            ],
            [
                'product_name' => 'Soni Tv',
                "product_price" => "500",
                "product_description" => "A tv with much more feature",
                "category_id" => "tv",
                "product_gallary" => "https://4.imimg.com/data4/PM/KH/MY-34794816/lcd-500x500.png"
            ],
            [
                'product_name' => 'LG fridge',
                "product_price" => "200",
                "product_description" => "A fridge with much more feature",
                "category_id" => "fridge",
                "product_gallary" => "https://encrypted-tbn0.gstatic.com/images?q=tbn%3AANd9GcTFx-2-wTOcfr5at01ojZWduXEm5cZ-sRYPJA&usqp=CAU"
            ]
        ];
        Product::insert($data);
    }
}
