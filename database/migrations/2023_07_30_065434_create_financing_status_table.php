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
        Schema::create('financing_statuses', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id');
            $table->string('uid');
            $table->string('first_name');
            $table->string('last_name');
            $table->string('contact');
            $table->string('email')->nullable();
            $table->string('car_year');
            $table->string('car_make');
            $table->string('car_model');
            $table->string('car_variant');
            $table->string('car_plate_no');
            $table->string('car_price');
            $table->date('date');
            $table->string('time');
            $table->string('financing_bank');
            $table->string('status');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('financing_statuses');
    }
};
