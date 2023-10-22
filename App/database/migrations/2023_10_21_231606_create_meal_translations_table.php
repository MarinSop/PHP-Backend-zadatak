<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('meal_translations', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('meal_id')->unsigned();
            $table->integer('language_id')->unsigned();

            $table->string('title');
            $table->string('description');
            $table->string('slug')->unique();

            $table->unique(['meal_id','language_id']);
            $table->foreign('meal_id')->references('id')->on('meals')->onDelete('cascade');
            $table->foreign('language_id')->references('id')->on('languages')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('meal_translations');
    }
};
