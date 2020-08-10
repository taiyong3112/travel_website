<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBookingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('bookings', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('customer_id');
            $table->unsignedInteger('tour_id');
            $table->tinyInteger('status')->default(0);
            $table->date('start_date');
            $table->integer('adult_number');
            $table->integer('children_number');
            $table->string('total_price');
            $table->string('note')->nullable();
            $table->tinyInteger('hotel_status')->default(0);
            $table->timestamp('created_at')->useCurrent();

            $table->foreign('tour_id')->references('id')->on('tours')->onDelete('cascade');
            $table->foreign('customer_id')->references('id')->on('customers')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('bookings');
    }
}
