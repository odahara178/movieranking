<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRecommendedsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('recommendeds', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedInteger('user_id');
            $table->unsignedTinyInteger('1')->nullable();
            $table->unsignedTinyInteger('2')->nullable();
            $table->unsignedTinyInteger('3')->nullable();
            $table->unsignedTinyInteger('4')->nullable();
            $table->unsignedTinyInteger('5')->nullable();
            $table->unsignedTinyInteger('6')->nullable();
            $table->unsignedTinyInteger('7')->nullable();
            $table->unsignedTinyInteger('8')->nullable();
            $table->unsignedTinyInteger('9')->nullable();
            $table->unsignedTinyInteger('10')->nullable();
            $table->unsignedTinyInteger('11')->nullable();
            $table->unsignedTinyInteger('12')->nullable();
            $table->unsignedTinyInteger('13')->nullable();
            $table->unsignedTinyInteger('14')->nullable();
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
        Schema::dropIfExists('recommendeds');
    }
}
