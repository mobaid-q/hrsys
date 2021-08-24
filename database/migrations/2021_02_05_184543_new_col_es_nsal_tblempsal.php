<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class NewColEsNsalTblempsal extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('tblempsal', function (Blueprint $table) {
            $table->integer('es_nsal')->nullable()->after('es_agreed');
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
            $table->dropColumn('es_nsal');
        });
    }
}
