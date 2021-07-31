<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

class InsertDataCategoriesTable extends Migration
{
    public function up()
    {
        DB::table('categories')->insert(
            [
                ['title' => 'programacion'],
                ['title' => 'javascript'],
                ['title' => 'react'],
                ['title' => 'laravel'],
                ['title' => 'front-end'],
                ['title' => 'backend'],
                ['title' => 'bases de datos'],
                ['title' => 'node'],
                ['title' => 'mysql'],
                ['title' => 'tecnologia'],
                ['title' => 'diseño'],
            ]
        );
    }

    public function down()
    {
        DB::table('status_posts')->truncate();
    }
}
