<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCartItems extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cart_items', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->String('user_id')->nullable();
            $table->String('session_id')->nullable();
            $table->Integer("product_id");
            $table->String("product_name");
            $table->text("description");
            $table->Integer("product_quantity");
            $table->decimal("product_price",10,2);
            $table->decimal("subtotal",10,2)->nullable();
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
        Schema::dropIfExists('cart_items');
    }
}
