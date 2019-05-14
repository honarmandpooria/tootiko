<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {


//         removing the current seeds
        DB::table('languages')->truncate();
        DB::table('statuses')->truncate();
        DB::table('roles')->truncate();
        DB::table('users')->truncate();
        DB::table('qualities')->truncate();
        DB::table('categories')->truncate();



        // seeding
        $this->call(UsersTableSeeder::class);
        $this->call(StatusesTableSeeder::class);
        $this->call(RolesTableSeeder::class);
        $this->call(QualitiesTableSeeder::class);
        $this->call(LanguagesTableSeeder::class);
        $this->call(CategoriesTableSeeder::class);


    }
}
