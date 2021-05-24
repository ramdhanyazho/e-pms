<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSchedulesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('schedules', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('scheduler_id');
            $table->bigInteger('scheduled_id');
            $table->boolean('is_scheduled')->default(false);
            $table->jsonb('scheduled_contents')->nullable();
            $table->boolean('is_waiting_approval')->default(false);
            $table->jsonb('approval_contents')->nullable();
            $table->boolean('is_completed')->default(false);
            $table->jsonb('completed_contents')->nullable();
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
        Schema::dropIfExists('schedules');
    }
}
