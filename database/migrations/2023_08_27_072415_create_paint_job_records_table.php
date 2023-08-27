<?php

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('paint_job_records', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id');
            $table->unsignedBigInteger('TNX_No4')->unique();
            $table->string('first_name');
            $table->string('last_name');
            $table->string('contact');
            $table->integer('car_year');
            $table->string('car_make');
            $table->string('car_model');
            $table->string('car_variant');
            $table->string('unit_plate_no');
            $table->string('panel');
            $table->integer('amount');
            $table->date('date');
            $table->timestamps();
        });
        
        DB::unprepared('
        CREATE TRIGGER increment_TNX_No4 BEFORE INSERT ON paint_job_records
        FOR EACH ROW
        BEGIN
            SET NEW.TNX_No4 = IFNULL((SELECT MAX(TNX_No4) FROM paint_job_records), 5002023100) + 1;
        END;
    ');
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('paint_job_records');
    }
};
