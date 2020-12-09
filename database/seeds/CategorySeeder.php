<?php

use App\Category;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Category::create([
            'name' => 'home'
        ]);
        Category::create([
            'name' => 'technology'
        ]);
        Category::create([
            'name' => 'clothes'
        ]);
        Category::create([
            'name' => 'sports'
        ]);

    }
}
