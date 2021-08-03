<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

class addKeyImagePostsTable extends Migration
{
    public function up()
    {
        Schema::table('posts', function($table) {
            $table->string('key_image')->default('disable');
        });
    }

    public function down()
    {
        Schema::table('posts', function($table) {
            $table->dropColumn('key_image');
        });
    }
}
