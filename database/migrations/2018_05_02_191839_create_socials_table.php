<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSocialsTable extends Migration
{
    public function up()
    {
        Schema::create('socials', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('user_id');
            $table->mediumText('facebook_token')->nullable();
            $table->mediumText('twitter_token')->nullable();
            $table->mediumText('linkedin_token')->nullable();
            $table->mediumText('github_token')->nullable();
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('socials');
    }
}
