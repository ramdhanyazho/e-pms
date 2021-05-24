<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddFieldsInEmployeeKpisHistoriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('employee_kpis_histories', function (Blueprint $table) {
            $table->char('month', 2);
            $table->char('year', 4);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('employee_kpis_histories', function (Blueprint $table) {
            $table->dropColumn(['month', 'year']);
        });
    }
}
