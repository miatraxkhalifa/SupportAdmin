<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSOTypeNetworksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('s_o__type__networks', function (Blueprint $table) {
            $table->id();
            $table->boolean('status')->default('0'); //0 = online, 1 = offline
            $table->foreignId('so_id')->references('id')->on('s_o_s')->cascadeOnDelete();
            $table->string('connection_type')->nullable();
            $table->string('type')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('s_o__type__networks');
    }
}
