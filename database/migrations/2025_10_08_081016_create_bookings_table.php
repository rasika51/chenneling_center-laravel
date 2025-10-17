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
        Schema::create('bookings', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('userid');
            $table->unsignedBigInteger('doctorid');
            $table->date('date');
            $table->time('time');
            $table->string('marital_status')->nullable();
            $table->enum('payment_status', ['pending', 'paid', 'cancelled'])->default('pending');
            $table->enum('status', ['active', 'completed', 'cancelled'])->default('active');
            $table->string('patient_name');
            $table->timestamp('add_time')->useCurrent();
            $table->timestamps();
            
            // Foreign key constraints
            $table->foreign('userid')->references('id')->on('patients')->onDelete('cascade');
            $table->foreign('doctorid')->references('id')->on('doctor')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('bookings');
    }
};