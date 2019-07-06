<?php

use Illuminate\Database\Seeder;

class TicketStatusTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('ticket_statuses')->insert([
            'name'=>'باز'
        ]);
        DB::table('ticket_statuses')->insert([
            'name'=>'بسته'
        ]);
    }
}
