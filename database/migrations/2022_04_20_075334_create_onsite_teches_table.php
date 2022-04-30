<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOnsiteTechesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('onsite_teches', function (Blueprint $table) {
            $table->id();
            $table->string('deviceName');
            $table->string('issue');
            $table->string('address');
            $table->string('siteStatus');
            $table->longText('jobDescription')->nullable();
            $table->string('contactName')->nullable();
            $table->string('contactEmail')->nullable();
            $table->string('contactNumber')->nullable();
            $table->integer('approver');
            $table->integer('tasks_id');
            $table->date('dateCompleted')->nullable();
            $table->enum('jobReport', ['Yes', 'No'])->default('No');
            $table->string('PO')->nullable();
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
        Schema::dropIfExists('onsite_teches');
    }
}
