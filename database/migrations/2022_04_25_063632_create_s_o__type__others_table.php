<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSOTypeOthersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('s_o__type__others', function (Blueprint $table) {
            $table->id();
            $table->foreignId('so_id')->references('id')->on('s_o_s')->cascadeOnDelete();
            $table->string('details')->nullable(); // SO Details
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
        Schema::dropIfExists('s_o__type__others');
    }
}
