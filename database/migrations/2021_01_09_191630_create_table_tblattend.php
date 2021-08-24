<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTableTblattend extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tblattend', function (Blueprint $table) {
            $table->increments('at_id', 11);
            $table->string('at_date', 20);
            $table->string('at_checkin', 20);
            $table->string('at_checkout', 20);
            $table->integer('e_id')->unsigned();
            $table->enum('at_type', ['Manual', 'Machine']);
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
        Schema::dropIfExists('tblattend');
    }
}
