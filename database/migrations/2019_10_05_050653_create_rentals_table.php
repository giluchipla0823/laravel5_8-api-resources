<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRentalsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('rentals', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('vehicle_id');
            $table->foreign( 'vehicle_id')->references('id')->on('vehicles');
            $table->unsignedInteger('rental_status_id');
            $table->foreign( 'rental_status_id')->references('id')->on('rental_statuses');
            $table->unsignedInteger('customer_id');
            $table->foreign( 'customer_id')->references('id')->on('customers');
            $table->timestamp('from');
            $table->timestamp('to');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('rentals');
    }
}
