<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTableTbledocs extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tbledocs', function (Blueprint $table) {
            $table->increments('doc_id', 11);
            $table->text('doc_title');
            $table->text('doc_files');
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
        Schema::dropIfExists('tbledocs');
    }
}
