<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

class AddIsValidateUsersTable extends Migration
{
    public function up()
{
    Schema::table('users', function($table) {
        $table->integer('is_validate')->default(0);
    });
}

    public function down()
    {
        Schema::table('users', function($table) {
            $table->dropColumn('is_validate');
        });
    }
}
