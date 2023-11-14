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
			$table->bigInteger('customer_id');
			$table->bigInteger('branch_id');
			$table->bigInteger('product_id');
			$table->string('sale_quantity');
			$table->string('sub_total', 255);
			$table->string('grand_total', 255);
			$table->enum('payment_status', array('pending', 'paid', 'debtor'));
			$table->enum('sale_status', array('pending', 'processing', 'completed'));
			$table->text('sale_notes');
			$table->enum('sale_payment_method', array('bank_transfer', 'mobile_money', 'credit_card', 'cash'));
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
