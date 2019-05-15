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
            'created_at' => now(),
            'updated_at' => now()
        ]);
        DB::table('operations')->insert([
            'name' => 'فارسی به انگلیسی',
            'created_at' => now(),
            'updated_at' => now()
        ]);
    }
}
