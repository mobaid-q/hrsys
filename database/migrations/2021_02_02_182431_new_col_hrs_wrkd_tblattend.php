<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class NewColHrsWrkdTblattend extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('tblattend', function (Blueprint $table) {
            $table->string('at_hrs_wrkd', 20)->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('tblattend', function (Blueprint $table) {
            $table->dropColumn('at_hrs_wrkd');
        });
    }
}
