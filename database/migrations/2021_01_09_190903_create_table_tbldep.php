<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTableTbldep extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tbldep', function (Blueprint $table) {
            $table->increments('d_id', 11);
            $table->string('d_name', 200);
            $table->integer('br_id')->unsigned();
            $table->text('d_details');
            $table->integer('d_head')->default(0);
            $table->foreign('br_id')->references('br_id')->on('tblbranch');
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
        Schema::dropIfExists('tbldep');
    }
}
