<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddEtaToOnsiteTechesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('onsite_teches', function (Blueprint $table) {
            //
            $table->date('techETA')->nullable();
            $table->string('LTid')->nullable();
            $table->string('token')->nullable();
            $table->enum('Status', ['WIP', 'Booked', 'Cancelled', 'Visited', 'Paid'])->default('WIP');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('onsite_teches', function (Blueprint $table) {
            //
        });
    }
}
