<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

class CreateTransactionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('transactions', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained();
            $table->string('product_id');
            $table->foreign('product_id')->references('id')->on('products');
            $table->foreignId('office_id')->constrained();
            $table->date('date')->default(DB::raw('CURRENT_TIMESTAMP'));
            $table->boolean('type');
            $table->string('description');
            $table->double('quantity', 8, 2);
            $table->double('stock', 8, 2);
            $table->double('amount', 10, 2);
            $table->double('cost', 10, 2);
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
        Schema::dropIfExists('transactions');
    }
}
