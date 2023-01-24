<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateExerciseRecordsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('exercise_records', function (Blueprint $table) {
            $table->id();
            $table->timestamps();

            $table->string('name');
            $table->text('description')->nullable();
            $table->float('kcal');
            $table->unsignedInteger('minutes');
            $table->unsignedBigInteger('user_id');
            $table->date('date_at');

            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('exercise_records');
    }
}
