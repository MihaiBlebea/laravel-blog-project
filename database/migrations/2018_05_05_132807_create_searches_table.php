<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSearchesTable extends Migration
{
    public function up()
    {
        Schema::create('searches', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('user_id');
            $table->string('term');
            $table->integer('results_count');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('searches');
    }
}
