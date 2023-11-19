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
        Schema::create('product_categories', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('parent_product_category_id')->nullable();
            $table->string('product_category_code', 255)->nullable();
			$table->text('product_category_name', 255);
			$table->text('product_category_description', 255)->nullable();
			$table->enum('product_category_status', array('active', 'disabled'))->nullable();
			$table->text('product_category_image')->nullable();
            $table->foreign('parent_product_category_id')->references('id')->on('parent_product_categories');
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
        Schema::dropIfExists('product_categories');
    }
};
