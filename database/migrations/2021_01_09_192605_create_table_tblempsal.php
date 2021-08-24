<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTableTblempsal extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tblempsal', function (Blueprint $table) {
            $table->increments('es_id', 11);
            $table->integer('e_id')->unsigned();
            $table->integer('es_agreed');
            $table->string('es_start', 20);
            $table->string('es_end', 20)->nullable();
            $table->foreign('e_id')->references('e_id')->on('tblemp');
            // $table->id();
            // $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tblempsal');
    }
}
