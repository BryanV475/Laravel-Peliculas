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
        Schema::create('peliculas', function (Blueprint $table) {
            $table->engine="InnoDB";
            $table->bigIncrements('id');
            $table->bigInteger('gen_id')->unsigned();
            $table->bigInteger('dir_id')->unsigned();
            $table->bigInteger('for_id')->unsigned();
            $table->string('nombre');
            $table->decimal('costo');
            $table->date('estreno');

            $table->foreign('gen_id')->references('id')->on('generos')->onDelete("cascade");
            $table->foreign('dir_id')->references('id')->on('directores')->onDelete("cascade");
            $table->foreign('for_id')->references('id')->on('formatos')->onDelete("cascade");
            
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
