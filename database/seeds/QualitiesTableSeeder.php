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
            'name' => 'عالی',
            'price_factor' => '30'
        ]);
        DB::table('qualities')->insert([
            'name' => 'خوب',
            'price_factor' => '25'
        ]);
        DB::table('qualities')->insert([
            'name' => 'معمولی',
            'price_factor' => '20'
        ]);



    }
}
