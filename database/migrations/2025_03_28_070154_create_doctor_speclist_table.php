<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::create('doctor_speclist', function (Blueprint $table) {
            $table->id();
            $table->string('doctor_id');
            $table->enum('specialization' , ['Dental', 'Heart', 'Other']);
            $table->enum('gender', ['Male', 'Female', 'Other']);
            $table->timestamps();
         });
    }

    public function down()
    {
         Schema::dropIfExists('doctor_speclist');
    }

};
