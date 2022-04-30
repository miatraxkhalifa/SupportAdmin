<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSOSTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('s_o_s', function (Blueprint $table) {
            $table->id();
            $table->tinyInteger('disposal')->default('0'); // 0 = N/A 1 = ENGAGIS 2 = STORE 3 = return to warehouse
            $table->string('deviceName')->nullable();
            $table->foreignId('type')->references('id')->on('s_o__types')->cascadeOnDelete();
            $table->string('address')->nullable();
            $table->string('contactName')->nullable();
            $table->string('contactEmail')->nullable();
            $table->string('contactNumber')->nullable();
            $table->integer('approver');
            $table->integer('tasks_id');
            $table->longText('remarks')->nullable(); //reason for replacement
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
        Schema::dropIfExists('s_o_s');
    }
}
