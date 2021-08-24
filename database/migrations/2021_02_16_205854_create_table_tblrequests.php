<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTableTblrequests extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tblrequests', function (Blueprint $table) {
            $table->increments('req_id', 11);
            $table->string('req_title');
            $table->text('req_desc');
            $table->enum('req_status', ['read', 'unread'])->default('unread');
            $table->integer('d_id')->nullable();
            $table->integer('e_id');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tblrequests');
    }
}
