<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTableTblemp extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tblemp', function (Blueprint $table) {
            $table->increments('e_id', 11);
            $table->string('e_fname', 200);
            $table->string('e_lname', 200);
            // $table->string('eemail', 200);
            // $table->string('ephone', 20);
            $table->string('e_dob', 20);
            $table->text('e_addr');
            $table->string('e_city', 50);
            $table->string('e_cntry', 50);
            $table->string('e_image', 200);
            $table->string('e_phone', 20);
            $table->string('e_email', 200);
            // $table->string('eemphone', 50);
            $table->integer('e_status')->default(1);
            $table->string('e_hiredate', 20);
            $table->integer('et_id')->unsigned();
            $table->integer('dg_id')->unsigned();
            $table->integer('d_id')->unsigned();
            $table->integer('br_id')->unsigned();
            // $table->integer('cpid')->unsigned();

            $table->foreign('et_id')->references('et_id')->on('tblemptype');
            $table->foreign('dg_id')->references('dg_id')->on('tbldsg');
            $table->foreign('d_id')->references('d_id')->on('tbldep');
            $table->foreign('br_id')->references('br_id')->on('tblbranch');
            // $table->foreign('cpid')->references('cpid')->on('tblcompany');
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
        Schema::dropIfExists('tblemp');
    }
}
