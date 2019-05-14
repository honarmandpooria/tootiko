<?php

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        DB::table('users')->insert([

            'name' => 'پوریا هنرمند',
            'role_id' => 1,
            'email' => 'honarmandpooria@gmail.com',
            'email_verified_at' => now(),
            'password' => bcrypt('987654321A'), // secret
            'remember_token' => str_random(10),
            'created_at' => now(),
            'updated_at' => now()

        ]);

        DB::table('users')->insert([

            'name' => 'مترجم',
            'role_id' => 2,
            'email' => 'translator@tootiko.com',
            'email_verified_at' => now(),
            'password' => bcrypt('987654321A'), // secret
            'remember_token' => str_random(10),
            'created_at' => now(),
            'updated_at' => now()

        ]);

        DB::table('users')->insert([

            'name' => 'مشتری',
            'role_id' => 3,
            'email' => 'tyrant.71p@gmail.com',
            'email_verified_at' => now(),
            'password' => bcrypt('987654321A'), // secret
            'remember_token' => str_random(10),
            'created_at' => now(),
            'updated_at' => now()

        ]);
    }
}
