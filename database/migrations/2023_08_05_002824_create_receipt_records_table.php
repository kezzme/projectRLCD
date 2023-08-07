<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('receipt_records', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('user_id');
            $table->bigInteger('TNX_No');
            $table->date('date');
            $table->string('receive_from');
            $table->string('postal_address');
            $table->string('amount');
            $table->integer('price');
            $table->integer('uid'); //check
            $table->integer('car_year');
            $table->string('car_make');
            $table->string('car_model');
            $table->string('car_variant');
            $table->string('exterior_color');
            $table->string('car_price'); //check
            $table->string('car_plate_no');
            $table->string('image'); //check
            $table->integer('agreed_price');
            $table->integer('balance');
            $table->integer('deposit');
            $table->date('due_date');
            $table->json('checkboxes')->nullable();
            $table->string('first_name');
            $table->string('last_name');
            $table->string('contact');
            $table->string('witness');
            $table->string('client_name');
            $table->string('client_contact');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('receipt_records');
    }
};
