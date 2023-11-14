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
            $table->string('product_code', 255);
            $table->bigInteger('supplier_id');
            $table->bigInteger('product_branch_id');
			$table->bigInteger('product_brand_id');
			$table->bigInteger('product_parent_category_id');
			$table->bigInteger('product_category_id');
            $table->bigInteger('product_unit_id');
			$table->date('product_created_date');
			$table->date('product_expiry_date');
			$table->string('product_name', 255);
			$table->string('product_stock_quantity');
			$table->string('product_cost_price', 255);
			$table->string('product_selling_price', 255);
			$table->enum('product_status', array('active', 'disabled'));
			$table->text('product_description');
			$table->text('product_image');
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
