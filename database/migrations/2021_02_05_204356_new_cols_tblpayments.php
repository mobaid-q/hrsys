<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class NewColsTblpayments extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('tblpayments', function (Blueprint $table) {
            $table->integer('es_nsal')->nullable()->after('p_period');
            $table->integer('p_add')->nullable()->after('es_nsal');
            $table->integer('p_paid')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('tblpayments', function (Blueprint $table) {
            $table->dropColumn('es_nsal');
            $table->dropColumn('p_add');
            $table->dropColumn('p_paid');
        });
    }
}
