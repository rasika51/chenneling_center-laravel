<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up()
    {
        Schema::create('patients', function (Blueprint $table) {
            $table->id(); // Primary key
            $table->string('full_name');
            $table->string('email')->unique();
            $table->enum('gender', ['Male', 'Female', 'Other']);
            $table->date('dob');
            $table->string('contact_no');
            $table->text('address');
            $table->string('marital_status');
            $table->text('allergic_medicine')->nullable(); // Fixed typo
            $table->string('password'); // Fixed typo
            $table->timestamps(); // Adds created_at and updated_at
        });
    }

    public function down()
    {
        Schema::dropIfExists('patients');
    }
};
