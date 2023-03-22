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
        Schema::create('dishes', function (Blueprint $table) {
            $table->id();
            $table->foreignId('restaurant_id')
                  ->references('id')
                  ->on('restaurants')
                  ->cascadeOnDelete();
            $table->string('name', 50);
            $table->text('description')
                  ->nullable();
            $table->text('ingredients');
            $table->float('price', 4, 2);
            $table->text('image_path')
                  ->nullable();
            $table->boolean('visible');
            $table->boolean('vegetarian')
                  ->nullable();
            $table->boolean('vegan')
                  ->nullable();
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
        Schema::dropIfExists('dishes');
    }
};
