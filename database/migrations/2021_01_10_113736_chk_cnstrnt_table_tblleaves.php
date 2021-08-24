<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class ChkCnstrntTableTblleaves extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('tblleaves', function (Blueprint $table) {
            DB::statement('ALTER TABLE tblleaves ADD CONSTRAINT cnstrnt_chk_ledate CHECK ("l_edate" > "l_sdate")');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('tblleaves', function (Blueprint $table) {
            DB::statement('ALTER TABLE tblleaves DROP CHECK cnstrnt_chk_ledate');
        });
    }
}
