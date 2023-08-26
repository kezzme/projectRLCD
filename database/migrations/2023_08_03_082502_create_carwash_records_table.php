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
        Schema::create('carwash_records', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id');
            $table->unsignedBigInteger('TNX_No')->unique();
            $table->string('first_name');
            $table->string('last_name');
            $table->string('contact');
            $table->string('car_make');
            $table->string('car_model');
            $table->string('unit_plate_no');
            $table->string('body_type');
            $table->decimal('amount', 8, 2); 
            $table->date('date');
            $table->text('special_request')->nullable();
            $table->timestamps();
        });

        DB::unprepared('
        CREATE TRIGGER increment_TNX_No BEFORE INSERT ON receipt_records
        FOR EACH ROW
        BEGIN
            SET NEW.TNX_No = IFNULL((SELECT MAX(TNX_No) FROM receipt_records), 3002023100) + 1;
        END;
    ');
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('carwash_records');
    }
};
