<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMealDishesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('meal_dishes', function (Blueprint $table) {
            $table->id();
            $table->timestamps();

            $table->unsignedBigInteger('meal_id');
            $table->unsignedBigInteger('dish_id');

            $table->foreign('meal_id')->references('id')->on('meals')->onDelete('cascade');
            $table->foreign('dish_id')->references('id')->on('dishes')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('meal_dishes');
    }
}
