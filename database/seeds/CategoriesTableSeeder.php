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
        DB::table('categories')->insert(['category' => 'Personal']);
        DB::table('categories')->insert(['category' => 'Education']);
        DB::table('categories')->insert(['category' => 'Work']);
        DB::table('categories')->insert(['category' => 'Other']);
    }
}
