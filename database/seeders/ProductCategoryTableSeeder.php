<?php

namespace Database\Seeders;

use App\Models\ProductCategory;
use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProductCategoryTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('product_categories')->truncate();

        $categories = ['HDD', 'CPU', 'RAM', 'Motherboard', 'Accessories', 'Cables', 'Monitor', 'Laptop', 'Keyboard & Mouse'];
        foreach ($categories as $category) {
            ProductCategory::create([
                'title' => $category,
                'description' => $category . ' description',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ]);
        }
    }
}
