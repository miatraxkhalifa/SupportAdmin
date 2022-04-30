<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateHardwareReturnsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('hardware_returns', function (Blueprint $table) {
            $table->id();
            $table->integer('tasks_id');
            $table->tinyInteger('status')->default('0'); // 0 = for collection  | 1 =  for pick up | 2 = shipped | 3 = returned | 4 = for RA
            //  $table->integer('so_id')->nullable();
            $table->foreignId('so_id')->references('id')->on('s_o_s')->cascadeOnDelete();
            $table->longText('remarks')->nullable();
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
        Schema::dropIfExists('hardware_returns');
    }
}
