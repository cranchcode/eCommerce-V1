<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Product;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Product::insert([
            [
                'title' => 'Product 1',
                'description' => 'This is the desc of product 1',
                'url' => 'https://wallpapercave.com/wp/wp6913331.jpg',
                'price' => 23,
                'user_id' => 7
            ],
            [
                'title' => 'Product 2',
                'description' => 'This is the desc of product 2',
                'url' => 'https://www.pixelstalk.net/wp-content/uploads/2016/10/Anime-Landscape-Backgrounds.jpg',
                'price' => 50,
                'user_id' => 7
            ],
            [
                'title' => 'Product 3',
                'description' => 'This is the desc of product 3',
                'url' => 'https://wallpaperboat.com/wp-content/uploads/2020/06/03/42361/aesthetic-anime-04.jpg',
                'price' => 12,
                'user_id' => 8
            ]
        ]);
    }
}
