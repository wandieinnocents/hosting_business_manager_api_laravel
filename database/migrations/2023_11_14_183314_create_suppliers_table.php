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
        Schema::create('suppliers', function (Blueprint $table) {
            $table->id();
            $table->string('supplier_code', 255);
			$table->string('supplier_name', 255);
			$table->string('supplier_email', 255);
			$table->string('supplier_phone', 255);
			$table->string('supplier_address', 255);
			$table->string('supplier_city', 255);
			$table->string('supplier_country', 255);
			$table->string('supplier_organization', 255);
			$table->enum('supplier_status', array('active', 'inactive'));
			$table->string('supplier_description', 255);
			$table->string('supplier_website_url', 255);
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
        Schema::dropIfExists('suppliers');
    }
};
