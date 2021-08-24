<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTableTblleaves extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tblleaves', function (Blueprint $table) {
            $table->increments('l_id', 11);
            $table->float('l_qty');
            $table->string('l_sdate', 20);
            $table->string('l_edate', 20);
            $table->text('l_details');
            $table->integer('l_alter_eid');
            $table->string('l_ephone', 20);
            $table->integer('e_id')->unsigned();
            $table->foreign('e_id')->references('e_id')->on('tblemp');
            $table->integer('lq_id')->unsigned();
            $table->foreign('lq_id')->references('lq_id')->on('tblquolev');
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
        Schema::dropIfExists('tblleaves');
    }
}
