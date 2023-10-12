<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('products', function (Blueprint $table) {
            $table->increments('id');            
            $table->string('model');
            $table->string('manufacturer');
            $table->string('name');
            $table->string('slug');
            $table->string('make_in')->default('đang cập nhật');
            $table->string('design')->default('đang cập nhật');
            $table->string('size')->default('đang cập nhật');
            $table->string('color')->default('đang cập nhật');
            $table->string('type')->default('đang cập nhật');
            $table->string('apply')->default('đang cập nhật');
            $table->string('warranty')->default('đang cập nhật');
            $table->text('images');          
            $table->text('review');
            $table->string('tag');
            $table->decimal('price', 13, 2);
            $table->integer('status');
            $table->integer('like_count');            
            $table->integer('view_count');
            $table->integer('qty')->default(0);
            $table->integer('cat_id')->unsigned();
            $table->foreign('cat_id')->references('id')->on('category')->onDelete('cascade');
            $table->integer('a_id')->unsigned();
            $table->foreign('a_id')->references('id')->on('admin_users')->onDelete('cascade');
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
        Schema::drop('products');
    }
}
