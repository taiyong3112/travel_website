<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRatingsTable extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::create('ratings', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('rating');
            $table->unsignedInteger('customer_id');
            $table->unsignedInteger('tour_id');
            $table->string('comment');
            $table->tinyInteger('rating')->default(0);
            $table->timestamp('created_at')->useCurrent();
            
            $table->foreign('customer_id')->references('id')->on('customers')->onDelete('cascade');
            $table->foreign('tour_id')->references('id')->on('tours')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down()
    {
        Schema::drop('ratings');
    }
}
