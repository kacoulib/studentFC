<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

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
            $table->unsignedInteger('post_id');
            $table->unsignedInteger('tag_id');
            $table->unique(['post_id', 'tag_id']);
            $table->foreign('post_id')
                ->references('id')
                ->on('posts')
                ->onDelete('CASCADE');
            $table->foreign('tag_id')
                ->references('id')
                ->on('tags')
                ->onDelete('CASCADE');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('post_tag');
    }
}
