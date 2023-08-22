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
        Schema::create('receipt_records', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('user_id');
            $table->unsignedBigInteger('TNX_No')->unique();
            $table->date('date');
            $table->string('received_from');
            $table->string('postal_address');
            $table->string('amount');
            $table->integer('price');
            $table->integer('uid');
            $table->integer('car_year');
            $table->string('car_make');
            $table->string('car_model');
            $table->string('car_variant');
            $table->string('exterior_color');
            $table->string('car_price');
            $table->string('car_plate_no');
            $table->string('image');
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

        DB::unprepared('
        CREATE TRIGGER increment_TNX_No BEFORE INSERT ON receipt_records
        FOR EACH ROW
        BEGIN
            SET NEW.TNX_No = IFNULL((SELECT MAX(TNX_No) FROM receipt_records), 1002023100) + 1;
        END;
    ');
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('receipt_records');
    }
};
