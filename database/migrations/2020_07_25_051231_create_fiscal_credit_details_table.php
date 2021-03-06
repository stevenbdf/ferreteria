<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFiscalCreditDetailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('fiscal_credit_details', function (Blueprint $table) {
            $table->id();
            $table->foreignId('fiscal_credit_id')->constrained();
            $table->char('product_id', 8);
            $table->foreign('product_id')->references('id')->on('products');
            $table->double('quantity', 10, 2);
            $table->double('sale_price', 10, 2);
            $table->double('iva', 10, 2);
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
        Schema::dropIfExists('fiscal_credit_details');
    }
}
