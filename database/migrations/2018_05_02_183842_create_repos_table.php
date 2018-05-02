<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateReposTable extends Migration
{
    public function up()
    {
        Schema::create('repos', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('user_id');
            $table->string('name');
            $table->string('full_name');
            $table->string('url')->unique();
            $table->string('language');
            $table->string('homepage');
            $table->string('description');
            $table->timestamp('was_created');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('repos');
    }
}
