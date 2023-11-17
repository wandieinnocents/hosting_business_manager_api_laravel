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
        Schema::create('brands', function (Blueprint $table) {
            $table->id();
            $table->string('brand_code', 255)->nullable();
            $table->string('brand_name', 255);
			$table->date('brand_register_date')->nullable();
			$table->enum('brand_status', array('active', 'disabled'))->nullable();
			$table->text('brand_image')->nullable();
			$table->text('brand_description', 255)->nullable();
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
        Schema::dropIfExists('brands');
    }
};
