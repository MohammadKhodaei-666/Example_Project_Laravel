<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateArticleCategoryTable extends Migration
{
    public function up()
    {
        Schema::create('article_category', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('article_id');
            $table->unsignedBigInteger('category_id');
            $table->foreign('article_id')->references('id')->on('articles')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('category_id')->references('id')->on('categories')->onDelete('cascade')->onUpdate('cascade');
            $table->timestamps();

            $table->unique(['article_id','category_id']);
        });
    }

    public function down()
    {
        Schema::dropIfExists('article_category');
    }
}
