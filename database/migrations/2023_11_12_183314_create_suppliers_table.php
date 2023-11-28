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
            $table->string('supplier_code', 255)->nullable();
			$table->text('supplier_name');
            $table->date('supplier_register_date')->nullable();
			$table->string('supplier_email', 255)->nullable();
			$table->string('supplier_phone', 255);
			$table->text('supplier_address')->nullable();
			$table->string('supplier_city', 255)->nullable();
			$table->string('supplier_country', 255)->nullable();
			$table->text('supplier_organization')->nullable();
			$table->enum('supplier_status', array('active', 'inactive'))->nullable();
			$table->text('supplier_description')->nullable();
			$table->text('supplier_website_url')->nullable();
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
