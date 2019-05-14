<?php

use Illuminate\Database\Seeder;

class CategoriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        DB::table('categories')->insert([
            'name' => 'عمومی'
        ]);
        DB::table('categories')->insert([
            'name' => 'مهندسی'
        ]);
        DB::table('categories')->insert([
            'name' => 'پزشکی'
        ]);
        DB::table('categories')->insert([
            'name' => 'انسانی'
        ]);


    }
}
