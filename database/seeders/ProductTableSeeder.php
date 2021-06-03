<?php

namespace Database\Seeders;

use App\Models\Product;
use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProductTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::statement('SET FOREIGN_KEY_CHECKS=0;');
        DB::table('products')->truncate();
        DB::statement('SET FOREIGN_KEY_CHECKS=1;');

        $products = [
            ['Seagate 128GB SSD', 1, 560.99],
            ['Seagate 256GB SSD', 1, 700],
            ['WD 1GB SSD', 1, 850],
            ['Seagate 2GB SSD', 1, 1000],
            ['Intel i5 CPU', 2, 1450],
            ['Intel i7 CPU', 2, 1900],
            ['2GB DDR3', 3, 350],
            ['4GB DDR3', 3, 500],
            ['8GB DDR4', 3, 600],
            ['19inch Dell Monitor', 7, 1600],
            ['22inch Dell Monitor', 7, 1750],
            ['23inch Dell Monitor', 7, 2100.50],
            ['27inch Dell Monitor', 7, 2300],
            ['32inch Dell Monitor', 7, 3250],
            ['Asus 15inch i7 Laptop', 8, 6500],
            ['HP 17inch i9 Laptop', 8, 22500],
            ['Dell 17inch i7 Laptop', 8, 24600],
            ['MacBook 13inch i7', 8, 35000],
        ];

        foreach ($products as $product) {
            Product::create([
                'title' => $product[0],
                'product_category_id' => $product[1],
                'price' => $product[2],
                'active' => 1,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ]);
        }
    }
}
