<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEmployeesPointsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('employees_points', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('employee_id');
            $table->smallInteger('year');
            $table->float('point', 4, 2);
            $table->string('point_alpha', 2);
            $table->string('point_alpha_final', 4, 2);
            $table->timestamp('point_updated_at', 0);
            $table->timestamp('point_alpha_final_updated_at', 0);
            $table->bigInteger('point_alpha_final_updated_by');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('employees_points');
    }
}
