<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSeosTable extends Migration
{
    public function up()
    {
        Schema::create('seos', function (Blueprint $table) {
            $table->id();
            $table->string('canonical');
            $table->string('meta_title');
            $table->text('meta_description');
            $table->string('meta_keywords');
            $table->timestamps();
            $table->softDeletes();
        });
    }

    public function down()
    {
        Schema::dropIfExists('seos');
    }
}
