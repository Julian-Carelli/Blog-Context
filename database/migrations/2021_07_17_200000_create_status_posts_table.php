<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateStatusPostsTable extends Migration
{
    public function up()
    {
        Schema::create('status_posts', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name');
        });
    }

    public function down()
    {
        Schema::dropIfExists('status_posts');
    }
}
