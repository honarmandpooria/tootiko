<?php

use Illuminate\Database\Seeder;

class RolesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        DB::table('roles')->insert([
            'name' => 'boss'
        ]);
        DB::table('roles')->insert([
            'name' => 'مترجم'
        ]);
        DB::table('roles')->insert([
            'name' => 'مشتری'
        ]);

    }
}
