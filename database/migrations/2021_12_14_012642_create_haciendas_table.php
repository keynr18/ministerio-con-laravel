<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateHaciendasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('haciendas', function (Blueprint $table) {
            $table->id();
            $table->string('name',50);
            $table->string('direccion');
            $table->string('telefono');
            $table->string('hectaria');
            $table->string('estado');
            $table->string('municipio');
            $table->string('parroquia');
            
            $table->unsignedBigInteger('user_id')->nullable();
           // $table->unsignedBigInteger('parroquia_id');

            $table->foreign('user_id')->references('id')->on('users')
                    ->onDelete('cascade')
                    ->onUpdate('cascade');
           // $table->foreign('parroquia_id')->references('id')->on('parroquias');
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
        Schema::dropIfExists('haciendas');
    }
}
