<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePostsTable extends Migration
{
    public function up()
    {
        Schema::create('posts', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('category_id');
            $table->integer('user_id');
            $table->string('slug')->unique();
            $table->string('title')->nullable();
            $table->string('feature_image')->nullable();
            $table->longText('content')->nullable();
            $table->boolean('published')->default(false);
            $table->timestamp('publish_at')->nullable();
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('posts');
    }
}
