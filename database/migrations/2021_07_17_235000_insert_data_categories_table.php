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
                ['id' => 1, 'title' => 'programacion'],
                ['id' => 2, 'title' => 'javascript'],
                ['id' => 3, 'title' => 'react'],
                ['id' => 4, 'title' => 'laravel'],
                ['id' => 5, 'title' => 'front end'],
                ['id' => 6, 'title' => 'backend'],
                ['id' => 7, 'title' => 'bases de datos'],
                ['id' => 8, 'title' => 'node'],
                ['id' => 9, 'title' => 'mysql'],
                ['id' => 10,'title' => 'tecnologia'],
                ['id' => 11,'title' => 'diseño'],
            ]
        );
    }

    public function down()
    {
        DB::table('status_posts')->truncate();
    }
}
