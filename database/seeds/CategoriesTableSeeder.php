<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CategoriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for ($i = 1;$i <= 10;$i++){
            DB::table('categories')->insert([
                'name' => str_random(10),
                'rank' => rand(1,200),
                'image' => str_random(5),
                'slug' => str_random(5),
                'created_by' => 3,
                'description' => str_random(50),

            ]);
        }
    }
}
