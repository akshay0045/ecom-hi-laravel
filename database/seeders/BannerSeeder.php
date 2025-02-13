<?php

namespace Database\Seeders;

use App\Models\Banner;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class BannerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = [
            [
                'banner_img' => 'https://static.vecteezy.com/system/resources/thumbnails/011/871/820/small/online-shopping-on-phone-buy-sell-business-digital-web-banner-application-money-advertising-payment-ecommerce-illustration-search-vector.jpg',
                "banner_name" => "Online Shopping",
                "banner_description" => "Shop our Summer Sale - Up to 50% off on selected styles! Discover the latest trends in dresses, tops, and more. Limited time only - shop now!",
                
            ],
            [
                'banner_img' => 'https://www.shutterstock.com/image-vector/online-shopping-on-phone-buy-260nw-2078330851.jpg',
                "banner_name" => "Online Shopping",
                "banner_description" => "Shop our Summer Sale - Up to 50% off on selected styles! Discover the latest trends in dresses, tops, and more. Limited time only - shop now!",
                
            ],
            [
                'banner_img' => 'https://static.vecteezy.com/system/resources/previews/004/299/815/non_2x/online-shopping-on-phone-buy-sell-business-digital-web-banner-application-money-advertising-payment-ecommerce-illustration-search-vector.jpg',
                "banner_name" => "Online Shopping",
                "banner_description" => "Shop our Summer Sale - Up to 50% off on selected styles! Discover the latest trends in dresses, tops, and more. Limited time only - shop now!",
                
            ],
            [
                'banner_img' => 'https://static.vecteezy.com/system/resources/thumbnails/004/299/835/small/online-shopping-on-phone-buy-sell-business-digital-web-banner-application-money-advertising-payment-ecommerce-illustration-search-free-vector.jpg',
                "banner_name" => "Online Shopping",
                "banner_description" => "Shop our Summer Sale - Up to 50% off on selected styles! Discover the latest trends in dresses, tops, and more. Limited time only - shop now!",
                
            ]
        ];
        Banner::insert($data); 
    }
}
