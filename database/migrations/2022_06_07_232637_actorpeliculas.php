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
        Schema::create('actorpeliculas', function (Blueprint $table) {
            $table->engine="InnoDB";
            $table->bigIncrements('id');
            $table->bigInteger('act_id')->unsigned();
            $table->bigInteger('pel_id')->unsigned();
            $table->string('papel');

            $table->foreign('act_id')->references('id')->on('actores')->onDelete("cascade");
            $table->foreign('pel_id')->references('id')->on('peliculas')->onDelete("cascade");
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
        //
    }
};
