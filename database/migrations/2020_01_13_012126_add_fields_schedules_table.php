<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddFieldsSchedulesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('schedules', function (Blueprint $table) {
            $table->bigInteger('employee_kpis_id')->nullable();
            $table->string('filename')->nullable();
            $table->datetime('scheduled_date')->nullable();
            $table->boolean('is_approval_scheduler')->nullable();
            $table->boolean('is_approval_scheduled')->nullable();
            $table->datetime('approval_scheduler_date')->nullable();
            $table->datetime('approval_scheduled_date')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('schedules', function (Blueprint $table) {
            $table->bigInteger('employee_kpis_id')->nullable();
            $table->string('filename')->nullable();
            $table->datetime('scheduled_date')->nullable();
            $table->boolean('is_approval_scheduler')->nullable();
            $table->boolean('is_approval_scheduled')->nullable();
            $table->datetime('approval_scheduler_date')->nullable();
            $table->datetime('approval_scheduled_date')->nullable();
        });
    }
}
