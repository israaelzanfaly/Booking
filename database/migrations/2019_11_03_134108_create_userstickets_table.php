<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersticketsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('userstickets', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->integer('phone');
            $table->string('email');
            $table->unsignedInteger('category_id');
            $table->timestamps();
            $table->unique(['email','category_id']);
            $table->foreign('category_id')->references('id')->on('categories');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('userstickets');
    }
}
