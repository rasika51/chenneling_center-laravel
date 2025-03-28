<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration{
    public function up()
    {
        Schema::create('doctor', function (Blueprint $table) {
            $table->id(); // Primary key
            $table->string('Full_name');
            $table->string('Specilization');
            $table->string('Gender');
            $table->string('contact_no');
            $table->string('email')->unique();
            $table->string('passward');
            $table->string('ChangingDate');
            $table->string('ChangingTime');
            $table->decimal('Fees', 8, 2);
            $table->timestamps(); // Created at & Updated at
        });
    }

    public function down()
    {
        Schema::dropIfExists('doctor');
    }
};
