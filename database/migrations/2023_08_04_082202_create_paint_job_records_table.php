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
        Schema::create('paint_job_records', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained()->onDelete('cascade');
            $table->string('first_name');
            $table->string('last_name');
            $table->string('contact');
            $table->string('email');
            $table->integer('car_year');
            $table->string('car_make');
            $table->string('car_model');
            $table->string('car_variant');
            $table->string('unit_plate_no');
            $table->date('date');
            $table->string('time');
            $table->integer('amount');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('paint_job_records');
    }
};
