<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBannersImagesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('banners_images', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('bn_id')->unsigned();
            $table->foreign('bn_id')->references('id')->on('banners')->onDelete('cascade');
            $table->text('image_name');
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
        Schema::dropIfExists('banners_images');
    }
}
