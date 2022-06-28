<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Schema\ForeignKeyDefinition;
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
        Schema::create('actores', function (Blueprint $table) {
            
            $table->engine="InnoDB";
            $table->bigIncrements('id');
            $table->string('nombre');
            $table->bigInteger('sex_id')->unsigned();//Llave Foranea

            $table->timestamps();

            $table->foreign('sex_id')->references('id')->on('sexos')->onDelete("cascade");
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
