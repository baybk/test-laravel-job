<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBodyRecordsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('body_records', function (Blueprint $table) {
            $table->id();
            $table->timestamps();

            $table->float('weight');
            $table->float('fat_percentage');
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
        Schema::dropIfExists('body_records');
    }
}
