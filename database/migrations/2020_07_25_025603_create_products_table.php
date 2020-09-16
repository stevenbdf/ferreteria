<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('products', function (Blueprint $table) {
            $table->string('id')->unique();
            $table->primary('id');
            $table->foreignId('department_id')->constrained();
            $table->foreignId('supplier_id')->constrained();
            $table->string('description');
            $table->string('image_path')->nullable();
            $table->double('base_cost', 10, 2);
            $table->integer('profit');
            $table->double('price', 10, 2);
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
}
