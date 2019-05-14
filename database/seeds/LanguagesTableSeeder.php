<?php

use Illuminate\Database\Seeder;

class LanguagesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('languages')->insert([
            'name' => 'فارسی'
        ]);
        DB::table('languages')->insert([
            'name' => 'انگلیسی'
        ]);

    }
}
