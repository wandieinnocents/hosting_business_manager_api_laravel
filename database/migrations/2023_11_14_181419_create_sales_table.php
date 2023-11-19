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
        Schema::create('sales', function (Blueprint $table) {
            $table->id();
            $table->date('sale_date');
			$table->string('sale_ref_number', 255);
			$table->unsignedBigInteger('customer_id');
			$table->unsignedBigInteger('branch_id');
			$table->unsignedBigInteger('product_id');
			$table->string('sale_quantity');
			$table->string('sub_total', 255);
			$table->string('grand_total', 255);
			$table->enum('payment_status', array('pending', 'paid', 'debtor'));
			$table->enum('sale_status', array('pending', 'processing', 'completed'));
			$table->text('sale_notes');
			$table->enum('sale_payment_method', array('bank_transfer', 'mobile_money', 'credit_card', 'cash'));
            $table->foreign('customer_id')->references('id')->on('customers')->onDelete('cascade');
            $table->foreign('branch_id')->references('id')->on('branches')->onDelete('cascade');
            $table->foreign('product_id')->references('id')->on('products')->onDelete('cascade');
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
        Schema::dropIfExists('sales');
    }
};
