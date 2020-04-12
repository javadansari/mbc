<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRevs extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('revs', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('projectID');
            $table->integer('rev');
            $table->integer('allPipe');
            $table->integer('allStress');
            $table->integer('designPipe');
            $table->integer('stressPipe');
            $table->integer('supportPipe');
            $table->integer('releasePipe');
            $table->integer('fabricatePipe');
            $table->integer('noStatusPipe');
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
        Schema::dropIfExists('revs');
    }
}
