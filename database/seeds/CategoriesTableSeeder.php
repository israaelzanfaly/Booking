<?php

use Illuminate\Database\Seeder;
use App\Category;

class CategoriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \App\Category::create(['type'=>'Normal','price'=>400]);
        \App\Category::create(['type'=>'Student','price'=>200]);

    }
}
