<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class RenameFieldKpiIdInEmployeeKpisTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('employee_kpis', function (Blueprint $table) {
            $table->renameColumn('kpi_id', 'kpi_templates_id');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('employee_kpis', function (Blueprint $table) {
            $table->renameColumn('kpi_id', 'kpi_templates_id');
        });
    }
}
