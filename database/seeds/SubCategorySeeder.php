<?php

use Illuminate\Database\Seeder;
use App\SubCategory;

class SubCategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        SubCategory::create([
            'name' => 'couches',
            'category_id' => 1
        ]);
        SubCategory::create([
            'name' => 'closets',
            'category_id' => 1
        ]);
        SubCategory::create([
            'name' => 'laptops',
            'category_id' => 2
        ]);
        SubCategory::create([
            'name' => 'smartphones',
            'category_id' => 2
        ]);
        SubCategory::create([
            'name' => 'dresses',
            'category_id' => 3
        ]);
        SubCategory::create([
            'name' => 'shirts',
            'category_id' => 3
        ]);
        SubCategory::create([
            'name' => 'bicycles',
            'category_id' => 4
        ]);
        SubCategory::create([
            'name' => 'smart watches',
            'category_id' => 4
        ]);
    }
}
