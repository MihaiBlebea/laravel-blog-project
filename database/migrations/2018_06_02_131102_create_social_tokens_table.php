<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSocialTokensTable extends Migration
{
    public function up()
    {
        Schema::create('social_tokens', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('user_id');
            $table->text('token');
            $table->text('token_secret')->nullable();
            $table->string('channel');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('social_tokens');
    }
}
