<?php

use Illuminate\Database\Seeder;

class OperationsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('operations')->insert([
            'name' => 'انگلیسی به فارسی',
            'price_factor' => 1,
            'created_at' => now(),
            'updated_at' => now()
        ]);
        DB::table('operations')->insert([
            'name' => 'فارسی به انگلیسی',
            'price_factor' => 3,
            'name' => 'فارسی به انگلیسی',
            'created_at' => now(),
            'updated_at' => now()
        ]);
    }
}
