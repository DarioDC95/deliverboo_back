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
        Schema::create('dish_order', function (Blueprint $table) {
            $table->id();
            $table->foreignId('dish_id')
                  ->references('id')
                  ->on('dishes')
                  ->cascadeOnDelete();
            $table->foreignId('order_id')
                  ->references('id')
                  ->on('orders')
                  ->cascadeOnDelete();
            $table->tinyInteger('quantity');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('dish_order');
    }
};
