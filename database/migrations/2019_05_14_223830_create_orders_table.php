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
            $table->string('code');
            $table->unsignedInteger('user_id');
            $table->unsignedInteger('status_id');
            $table->unsignedInteger('words')->nullable();
            $table->unsignedInteger('operation_id');
            $table->unsignedInteger('category_id');
            $table->unsignedInteger('file_id')->nullable();
            $table->string('translation_url')->nullable();
            $table->string('translated_file')->nullable();
//            $table->unsignedInteger('is_secret');
            $table->unsignedInteger('remaining_days');
            $table->longText('description')->nullable();
            $table->timestamps();
            $table->softDeletes();
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
