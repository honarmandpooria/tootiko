<?php

use Illuminate\Database\Seeder;

class QualitiesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        DB::table('qualities')->insert([
            'name' => 'عالی'
        ]);
        DB::table('qualities')->insert([
            'name' => 'خوب'
        ]);
        DB::table('qualities')->insert([
            'name' => 'معمولی'
        ]);



    }
}
