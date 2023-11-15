<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('customers', function (Blueprint $table) {
            $table->id();
            $table->string('client_first_name', 255);
			$table->string('client_last_name', 255);
			$table->string('client_phone', 255);
			$table->date('client_dob');
			$table->string('client_email', 255);
			$table->string('client_sex', 255);
			$table->string('client_age', 255);
			$table->string('client_address', 255);
			$table->string('client_city', 255);
			$table->enum('client_status', array('active', 'inactive'));
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('customers');
    }
};
