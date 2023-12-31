<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateNewsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('news', function (Blueprint $table) {
            $table->increments('id');
            $table->string('title');
            $table->string('slug');
            $table->string('author');            
            $table->string('tag')->nullable();            
            $table->text('intro');
            $table->text('full');
            $table->text('images');
            $table->integer('status')->default(1);
            $table->integer('views_count')->default(0);
            $table->text('source')->nullable();
            $table->integer('cat_id')->unsigned();
            $table->foreign('cat_id')->references('id')->on('category')->onDelete('cascade');
            $table->integer('user_id')->unsigned();
            $table->foreign('user_id')->references('id')->on('admin_users')->onDelete('cascade');
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
        Schema::drop('news');
    }
}
