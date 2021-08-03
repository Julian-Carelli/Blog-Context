<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

class addSlugUsersTable extends Migration
{
    public function up()
{
    Schema::table('users', function($table) {
        $table->string('slug')->unique()->default('');
    });
}

    public function down()
    {
        Schema::table('users', function($table) {
            $table->dropColumn('slug');
        });
    }
}
