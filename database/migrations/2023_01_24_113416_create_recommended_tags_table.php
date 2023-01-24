<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRecommendedTagsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('recommended_tags', function (Blueprint $table) {
            $table->id();
            $table->timestamps();

            $table->unsignedBigInteger('recommended_id');
            $table->unsignedBigInteger('tag_id')->nullable();

            $table->foreign('recommended_id')->references('id')->on('recommended')->onDelete('cascade');
            $table->foreign('tag_id')->references('id')->on('tags')->onDelete('set null');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('recommended_tags');
    }
}
