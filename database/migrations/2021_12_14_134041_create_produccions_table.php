<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProduccionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('produccions', function (Blueprint $table) {
            $table->id();
            $table->string('fechaS');
            $table->string('fechaC');
            $table->string('cantidadS');
            $table->string('cultivo');

            //$table->unsignedBigInteger('cultivo_id');
            //$table->foreign('cultivo_id')->references('id')->on('cultivos');

            $table->unsignedBigInteger('hacienda_id');
            $table->foreign('hacienda_id')->references('id')->on('haciendas')
                    ->onDelete('cascade')
                    ->onUpdate('cascade');
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
        Schema::dropIfExists('produccions');
    }
}
