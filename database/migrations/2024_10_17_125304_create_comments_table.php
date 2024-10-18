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
        Schema::create('comments', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('blog_id');
            $table->unsignedInteger('user_id'); 
            $table->text('comment', 500);
    
            $table->foreign('user_id', 'comments_user_id_foreign')
            ->references('id')
            ->on('users')
            ->onDelete('cascade');

            $table->foreign('blog_id', 'foreign_blog')
                ->references('id')
                ->on('blogs')
                ->onDelete('cascade');
    
            $table->timestamps();
        });
    }
    

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('comments');
    }
}
