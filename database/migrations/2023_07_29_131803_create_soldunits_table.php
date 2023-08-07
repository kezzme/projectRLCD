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
        Schema::create('soldunits', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained()->onDelete('cascade');
            $table->string('car_year');
            $table->string('car_make');
            $table->string('car_model');
            $table->string('car_variant');
            $table->string('plate_no');
            $table->string('image');
            $table->string('first_name');
            $table->string('last_name');
            $table->string('phone');
            $table->string('price');
            $table->date('date');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('soldunits');
    }
};
