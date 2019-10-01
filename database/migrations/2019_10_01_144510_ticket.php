<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Ticket extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tickets', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('mesa_mesero_id');
            $table->unsignedBigInteger('platillos_mesa');
            $table->float('total');
            
            $table->foreign('platillos_mesa')->references('id')->on('platillos_mesa')->onDelete('cascade');
            $table->foreign('mesa_mesero_id')->references('id')->on('mesa_mesero')->onDelete('cascade');
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tickets');
    }
}
