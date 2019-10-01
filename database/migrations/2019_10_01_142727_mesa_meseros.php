<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class MesaMeseros extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('mesa_mesero', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('mesero_id');
            $table->unsignedBigInteger('mesa_id');

            $table->foreign('mesero_id')->references('id')->on('meseros')->onDelete('cascade');
            $table->foreign('mesa_id')->references('id')->on('mesas')->onDelete('cascade');    
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
        Schema::dropIfExists('mesa_mesero');
    }
}
