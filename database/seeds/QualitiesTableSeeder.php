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
            'name' => 'طلایی'
        ]);
        DB::table('qualities')->insert([
            'name' => 'نقره ای'
        ]);
        DB::table('qualities')->insert([
            'name' => 'عادی'
        ]);



    }
}
