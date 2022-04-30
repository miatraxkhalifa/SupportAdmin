<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateWarrantyRepairsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('warranty_repairs', function (Blueprint $table) {
            $table->id();
            $table->string('type');
            $table->string('address');
            $table->string('contactName')->nullable();
            $table->string('contactEmail')->nullable();
            $table->string('contactNumber')->nullable();
            $table->integer('approver');
            $table->integer('tasks_id');
            $table->string('issue');
            $table->string('brandModel');
            $table->string('serial');
            $table->longText('remarks')->nullable();
            $table->string('quote')->nullable();
            $table->tinyInteger('status')->default('0');
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
        Schema::dropIfExists('warranty_repairs');
    }
}
