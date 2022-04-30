<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddStatusTosOSTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('s_o_s', function (Blueprint $table) {
            //
            $table->enum('Status', ['WIP', 'Awaiting Dispatch', 'Awaiting Hardware', 'Cancelled', 'onHold', 'Shipped'])->default('WIP');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('s_o_s', function (Blueprint $table) {
            //
        });
    }
}
