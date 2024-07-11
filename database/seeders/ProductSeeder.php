<?php

namespace Database\Seeders;
use App\Models\Product;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {   
        $products = [
            [
                'image_url' => '/images/xps-10.jpg',
                'name' => 'ROLAND',
                'description' => 'XPS-10',
                'price' => '32999.00',
                'quantity' => 32
            ],
            [
                'image_url' => '/images/xps-30.jpg',
                'name' => 'ROLAND',
                'description' => 'XPS-30',
                'price' => '42999.00',
                'quantity' => 32
            ],
            [
                'image_url' => '/images/nord-stage.jpg',
                'name' => 'NORD',
                'description' => 'Stage Keyboard',
                'price' => '45999.00',
                'quantity' => 32
            ],
            [
                'image_url' => '/images/nord-lead.jpg',
                'name' => 'NORD',
                'description' => 'Lead',
                'price' => '52999.00',
                'quantity' => 32
            ],
            [
                'image_url' => '/images/nord-electro.jpg',
                'name' => 'NORD',
                'description' => 'electro',
                'price' => '56999.00',
                'quantity' => 32
            ],
        ];

        foreach($products as $product) {
            Product::create($product);
        }
    }
}
