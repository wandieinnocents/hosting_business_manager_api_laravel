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
        Schema::create('parent_product_categories', function (Blueprint $table) {
            $table->id();
            $table->string('parent_product_category_code', 255)->nullable();
			$table->string('parent_product_category_name', 255);
			$table->text('parent_product_category_description')->nullable();
			$table->enum('parent_product_category_status', array('active', 'disabled'))->default('active')->nullable();
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
        Schema::dropIfExists('parent_product_categories');
    }
};
