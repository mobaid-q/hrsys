<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTableTblpayments extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tblpayments', function (Blueprint $table) {
            $table->increments('p_id', 11);
            $table->integer('e_id')->unsigned();
            $table->integer('p_gsal');
            $table->integer('p_nsal');
            $table->string('p_period', 20);
            $table->foreign('e_id')->references('e_id')->on('tblemp');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tblpayments');
    }
}
