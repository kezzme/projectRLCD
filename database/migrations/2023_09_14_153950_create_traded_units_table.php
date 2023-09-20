<?php

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

return new class extends Migration
{
   
    public function up(): void
    {
        Schema::create('traded_units', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id');
            $table->string('received_from');
            $table->string('postal_address');
            $table->string('agreed_amount');
            $table->string('added_by');
            $table->string('amount');
            $table->integer('price');
            $table->string('uid');
            $table->string('car_year');
            $table->string('car_make');
            $table->string('car_model');
            $table->string('car_variant');
            $table->string('car_plate_no');
            $table->string('bought_price');
            $table->string('car_price');
            $table->string('image');
            $table->integer('car_trade_unit');
            $table->integer('balance');
            $table->integer('deposit');
            $table->date('due_date');
            $table->string('first_name');
            $table->string('last_name');
            $table->string('contact');
            $table->string('unit_year');
            $table->string('unit_make');
            $table->string('unit_model');
            $table->string('unit_variant');
            $table->string('unit_plate_no');
            $table->string('unit_trade_value');
            $table->date('date');
            $table->timestamps();
        });
    }

   
    public function down(): void
    {
        Schema::dropIfExists('traded_units');
    }
};
