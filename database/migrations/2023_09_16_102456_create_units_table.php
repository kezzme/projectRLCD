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
        Schema::create('units', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('uid');
            $table->integer('car_year');
            $table->string('car_make');
            $table->string('car_model');
            $table->string('car_variant');
            $table->string('car_plate_no');
            $table->string('description');
            $table->string('bought_price');
            $table->int('car_price');
            $table->string('engine');
            $table->string('transmission');
            $table->string('fuel');
            $table->string('odometer');
            $table->string('interior_color');
            $table->string('exterior_color');
            $table->string('drive_train');
            $table->string('body_type');
            $table->string('no_of_owners');
            $table->string('unit_type');
            $table->string('display_image_1');
            $table->string('display_image_2');
            $table->string('display_image_3');
            $table->string('display_image_4');
            $table->string('display_image_5');
            $table->string('display_image_6');
            $table->string('display_image_7');
            $table->string('display_image_8');
            $table->string('display_image_9');
            $table->timestamps();
        });
        
        DB::unprepared('
        CREATE TRIGGER increment_uid BEFORE INSERT ON units
        FOR EACH ROW
        BEGIN
            SET NEW.uid = IFNULL((SELECT MAX(uid) FROM units), 10020020231000) + 1;
        END;
    ');
        
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('units');
    }
};
