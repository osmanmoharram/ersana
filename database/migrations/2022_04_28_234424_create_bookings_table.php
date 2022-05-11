<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('bookings', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('customer_id');
            $table->date('date');
            $table->time('start_date');
            $table->time('end_date');
            $table->string('type');
            $table->string('guest_type');
            $table->string('food_menu');
            $table->string('price_type');
            $table->integer('individual_price')->nullable();
            $table->integer('number_of_guests')->nullable();
            $table->integer('fixed_price')->nullable();
            $table->integer('discount')->nullable();
            $table->integer('insurance')->nullable();
            $table->integer('vat');
            $table->integer('total');
            $table->string('status');
            $table->text('notes');
            $table->unsignedBigInteger('client_id')->nullable();
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
        Schema::dropIfExists('bookings');
    }
};
