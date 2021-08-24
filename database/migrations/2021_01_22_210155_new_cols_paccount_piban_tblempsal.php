<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class NewColsPaccountPibanTblempsal extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('tblempsal', function (Blueprint $table) {
            $table->bigInteger('p_account')->nullable();
            $table->string('p_iban', 24)->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('tblempsal', function (Blueprint $table) {
            $table->dropColumn('p_account');
            $table->dropColumn('p_iban');
        });
    }
}
