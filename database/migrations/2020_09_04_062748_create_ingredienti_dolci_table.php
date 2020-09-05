<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateIngredientiDolciTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ingredienti_dolci', function (Blueprint $table) {
            $table->bigIncrements('id');

            $table->unsignedBigInteger('ingrediente_id')->index();
            $table->foreign('ingrediente_id')->references('id')
                ->on('ingredienti')
                ->onDelete('cascade');

            $table->unsignedBigInteger('dolce_id')->index();
            $table->foreign('dolce_id')->references('id')
                ->on('dolci')
                ->onDelete('cascade');    
         
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('ingredienti_dolci');
    }
}
