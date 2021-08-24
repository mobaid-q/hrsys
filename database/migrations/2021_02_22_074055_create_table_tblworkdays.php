<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTableTblworkdays extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tblworkdays', function (Blueprint $table) {
            $table->increments('wo_id');
            $table->string('wo_period', 20);
            $table->integer('wo_tdays');
            $table->integer('wo_thours');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tblworkdays');
    }
}
