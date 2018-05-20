<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTracksTable extends Migration
{
    public function up()
    {
        Schema::create('tracks', function (Blueprint $table) {
            $table->increments('id');
            $table->string('link');
            $table->integer('count')->default(0);
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('tracks');
    }
}
