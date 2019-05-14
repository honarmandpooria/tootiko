<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateOrdersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedInteger('user_id');
            $table->unsignedInteger('status_id');
            $table->unsignedInteger('start_language_id');
            $table->unsignedInteger('target_language_id');
            $table->unsignedInteger('category_id');
            $table->string('translation_file');
            $table->string('quality_id');
            $table->unsignedInteger('is_secret');
            $table->unsignedInteger('remaining_days');
            $table->longText('description');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('orders');
    }
}
