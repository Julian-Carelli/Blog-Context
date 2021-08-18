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
                ['id' => 1, 'title' => 'programacion', 'slug' => 'programacion'],
                ['id' => 2, 'title' => 'javascript', 'slug' => 'javascript'],
                ['id' => 3, 'title' => 'react', 'slug' => 'react'],
                ['id' => 4, 'title' => 'laravel', 'slug' => 'laravel'],
                ['id' => 5, 'title' => 'front end', 'slug' => 'front-end'],
                ['id' => 6, 'title' => 'backend', 'slug' => 'backend'],
                ['id' => 7, 'title' => 'bases de datos', 'slug' => 'bases-de-datos'],
                ['id' => 8, 'title' => 'node', 'slug' => 'node'],
                ['id' => 9, 'title' => 'mysql', 'slug' => 'mysql'],
                ['id' => 10,'title' => 'tecnologia', 'slug' => 'tecnologia'],
                ['id' => 11,'title' => 'diseño', 'slug' => 'diseño'],
            ]
        );
    }

    public function down()
    {
        DB::table('categories')->truncate();
    }
}
