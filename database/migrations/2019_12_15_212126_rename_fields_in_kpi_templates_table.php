<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class RenameFieldsInKpiTemplatesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('kpi_templates', function (Blueprint $table) {
            $table->integer('bsc_id')->nullable();
            $table->integer('kra_id')->nullable();
            $table->integer('kpi_id')->nullable();
            $table->dropColumn(['bsc', 'kra', 'kpi']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('kpi_templates', function (Blueprint $table) {
            //
        });
    }
}
