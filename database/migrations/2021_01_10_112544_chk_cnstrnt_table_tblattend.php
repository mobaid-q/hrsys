<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class ChkCnstrntTableTblattend extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('tblattend', function (Blueprint $table) {
            DB::statement('ALTER TABLE tblattend ADD CONSTRAINT cnstrnt_chk_chkout CHECK ("at_checkout" > "at_checkin")');
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
            DB::statement('ALTER TABLE tblattend DROP CHECK cnstrnt_chk_chkout');
        });
    }
}
