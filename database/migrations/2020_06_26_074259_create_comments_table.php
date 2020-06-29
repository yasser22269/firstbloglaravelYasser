<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCommentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        // Schema::create('comments', function (Blueprint $table) {
        //     $table->bigIncrements('id');
        //     $table->string('name');
        //     $table->integer('user_id')->nullable()->unsigned();
        //     $table->integer('post_id')->nullable()->unsigned();
        //     $table->timestamps();
        // });

        // Schema::table('comments', function (Blueprint $table) {
        //     $table->foreign('user_id')
        //     ->references('id')
        //     ->on('users')
        //     ->onUpdate('cascade')
        //     ->onDelete('cascade');
        //     });

        //     Schema::table('comments', function (Blueprint $table) {
        //     $table->foreign('post_id')
        //     ->references('id')
        //     ->on('posts')
        //     ->onUpdate('cascade')
        //     ->onDelete('cascade');
        //     });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists(['user_id','post_id']);

        Schema::dropIfExists('comments');
    }
}
