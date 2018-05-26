<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProjectImagesTable extends Migration
{
    public function up()
    {
        Schema::create('project_images', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('image_id');
            $table->integer('project_id');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('project_images');
    }
}
