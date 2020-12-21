<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Like extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('likes', function (Blueprint $table){
            $table->foreignId('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->foreignId('tweet_id')->references('id')->on('tweets')->onDelete('cascade');
            $table->boolean('liked')->nullable();
            $table->timestamps();
            $table->primary(['user_id', 'tweet_id'], 'tweet_like_indexes');
            $table->unique(['user_id', 'tweet_id']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('likes');
    }
}
