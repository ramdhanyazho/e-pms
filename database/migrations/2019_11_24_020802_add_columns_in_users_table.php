<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddColumnsInUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->char('nik', 15);
            $table->char('level', 2);
            $table->integer('group_id');
            $table->integer('position_id');
            $table->char('status', 50);
            $table->integer('business_unit_id');
            $table->integer('org_unit_id');
            $table->integer('location_id');
            $table->char('company_name', 250);
            $table->date('join_date');
            $table->date('quit_date')->nullable();
            $table->char('costcenter_name', 250)->nullable();
            $table->date('contract_start')->nullable();
            $table->date('contract_ended')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropColumn(['nik', 'level', 'group_id', 'position_id', 'status', 'business_unit_id', 'org_unit_id',
                    'location_id', 'company_name', 'join_date', 'quit_date', 'costcenter_name', 'contract_start',
                    'contract_ended']);
        });
    }
}
