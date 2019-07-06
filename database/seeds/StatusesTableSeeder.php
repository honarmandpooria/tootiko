<?php

use Illuminate\Database\Seeder;

class StatusesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('statuses')->insert([
            'name'=>'در حال بررسی'
        ]);
        DB::table('statuses')->insert([
            'name'=>'در انتظار پرداخت'
        ]);
        DB::table('statuses')->insert([
            'name'=>'در حال ترجمه'
        ]);
        DB::table('statuses')->insert([
            'name'=>'تحویل داده شده'
        ]);
    }
}
