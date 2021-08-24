<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class ChkCnstrntTableTblquolev extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('tblquolev', function (Blueprint $table) {
            DB::statement('ALTER TABLE tblquolev ADD CONSTRAINT cnstrnt_chk_lqedate CHECK ("lq_edate" > "lq_sdate")');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('tblquolev', function (Blueprint $table) {
            DB::statement('ALTER TABLE tblquolev DROP CHECK cnstrnt_chk_lqedate');
        });
    }
}
