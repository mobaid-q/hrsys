<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTableTblquolev extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tblquolev', function (Blueprint $table) {
            $table->increments('lq_id', 11);
            $table->enum('lq_title', ['Annual', 'Sick', 'Emergency']);
            $table->float('lq_allowed');
            $table->float('lq_pending');
            $table->string('lq_sdate', 20);
            $table->string('lq_edate', 20);
            $table->integer('e_id')->unsigned();
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
        Schema::dropIfExists('tblquolev');
    }
}
