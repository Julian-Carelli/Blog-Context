<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

class InsertDataStatusPostsTable extends Migration
{
    public function up()
    {
        DB::table('status_posts')->insert(
            [
                ['name' => 'aprobado'],
                ['name' => 'rechazado'],
                ['name' => 'pendiente_de_revision'],
                ['name' => 'pendiente_de_validacion']
            ]
        );
    }

    public function down()
    {
        DB::table('status_posts')->truncate();
    }
}
