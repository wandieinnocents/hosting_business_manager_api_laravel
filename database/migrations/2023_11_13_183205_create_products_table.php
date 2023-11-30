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
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->string('product_code', 255)->nullable();
            $table->unsignedBigInteger('supplier_id')->nullable();
            $table->unsignedBigInteger('branch_id')->nullable();
			$table->unsignedBigInteger('brand_id')->nullable();
			$table->unsignedBigInteger('parent_product_category_id')->nullable();
			$table->unsignedBigInteger('product_category_id')->nullable();
            $table->unsignedBigInteger('unit_id')->nullable();
			$table->date('product_created_date')->nullable();
			$table->date('product_expiry_date')->nullable();
			$table->string('product_name', 255);
			$table->integer('product_stock_quantity')->nullable();
			$table->integer('product_cost_price')->nullable();
			$table->integer('product_selling_price')->nullable();
			$table->enum('product_status', array('active', 'disabled'))->nullable();
			$table->text('product_description')->nullable();
			$table->text('product_image')->nullable();
            $table->foreign('supplier_id')->references('id')->on('suppliers')->onDelete('cascade');
            $table->foreign('branch_id')->references('id')->on('branches')->onDelete('cascade');
            $table->foreign('brand_id')->references('id')->on('brands')->onDelete('cascade');
            $table->foreign('parent_product_category_id')->references('id')->on('parent_product_categories')->onDelete('cascade');
            $table->foreign('product_category_id')->references('id')->on('product_categories')->onDelete('cascade');
            $table->foreign('unit_id')->references('id')->on('units')->onDelete('cascade');

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
        Schema::dropIfExists('products');
    }
};
