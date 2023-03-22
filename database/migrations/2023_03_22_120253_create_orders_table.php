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
        Schema::create('orders', function (Blueprint $table) {
            $table->id();
            $table->foreignId('restaurant_id')
                  ->references('id')
                  ->on('restaurants')
                  ->cascadeOnDelete();
            $table->string('name_client', 50);
            $table->string('surname_client', 50);
            $table->string('email_client', 50);
            $table->string('phone_client', 20);
            $table->string('address_client');
            $table->float('total_price', 5, 2);
            $table->boolean('delivered');
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
        Schema::dropIfExists('orders');
    }
};
