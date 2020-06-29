<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePostTagTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('post_tag', function (Blueprint $table) {
            $table->Increments('id');
            $table->unsignedBigInteger('post_id')->unsigned();
            $table->foreign('post_id')->references('id') ->on('posts')->onUpdate('cascade')
            ->onDelete('cascade');
            $table->unsignedBigInteger('tag_id')->unsigned();
            $table->foreign('tag_id')->references('id') ->on('tags')   ->onUpdate('cascade')
            ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('post_tag');
    }
}
