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
        Schema::create('auto_detailing_records', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id');
            $table->unsignedBigInteger('TNX_No3')->unique();
            $table->string('first_name');
            $table->string('last_name');
            $table->string('contact');
            $table->integer('car_year');
            $table->string('car_make');
            $table->string('car_model');
            $table->string('car_variant');
            $table->string('unit_plate_no');
            $table->date('date');
            $table->integer('amount');
            $table->timestamps();
        });

        DB::unprepared('
        CREATE TRIGGER increment_TNX_No3 BEFORE INSERT ON auto_detailing_records
        FOR EACH ROW
        BEGIN
            SET NEW.TNX_No3 = IFNULL((SELECT MAX(TNX_No3) FROM auto_detailing_records), 4002023100) + 1;
        END;
    ');
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('auto_detailing_records');
    }
};
