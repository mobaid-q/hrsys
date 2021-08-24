<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class NewColEtdescTblemptype extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('tblemptype', function (Blueprint $table) {
            $table->text('et_desc')->addColumn();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('tblemptype', function (Blueprint $table) {
            $table->dropColumn('et_desc');
        });
    }
}
