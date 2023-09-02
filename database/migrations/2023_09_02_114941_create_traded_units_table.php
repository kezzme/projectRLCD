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
            $table->unsignedBigInteger('TNX_No5')->unique();
            $table->string('received_from');
            $table->string('postal_address');
            $table->string('amount');
            $table->integer('price');
            $table->string('added_by');
            $table->string('uid');
            $table->string('car_year');
            $table->string('car_make');
            $table->string('car_model');
            $table->string('car_variant');
            $table->string('car_plate_no');
            $table->string('car_price');
            $table->string('image');
            $table->integer('agreed_price');
            $table->integer('balance');
            $table->integer('deposit');
            $table->date('due_date');
            $table->json('checkboxes')->nullable();
            $table->string('first_name');
            $table->string('last_name');
            $table->string('contact');
            $table->string('unit_year');
            $table->string('unit_make');
            $table->string('unit_model');
            $table->string('unit_variant');
            $table->string('unit_plate_no');
            $table->string('unit_price');
            $table->json('checkboxes2')->nullable();
            $table->string('witness');
            $table->string('client_name');
            $table->string('client_contact');
            $table->date('date');
            $table->timestamps();
        });

        DB::unprepared('
        CREATE TRIGGER increment_TNX_No5 BEFORE INSERT ON traded_units
        FOR EACH ROW
        BEGIN
            SET NEW.TNX_No5 = IFNULL((SELECT MAX(TNX_No5) FROM traded_units), 6002023100) + 1;
        END;
    ');
    }

   
    public function down(): void
    {
        Schema::dropIfExists('traded_units');
    }
};
