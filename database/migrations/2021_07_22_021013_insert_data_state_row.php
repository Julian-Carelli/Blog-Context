<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

class InsertDataStateRow extends Migration
{
    public function up()
    {
        DB::table('status_posts')->insert(
            [
                ['name' => 'approved'],
                ['name' => 'rejected'],
                ['name' => 'pending_in_review'],
                ['name' => 'pending_in_validation']
            ]
        );
    }

    public function down()
    {
        DB::table('status_posts')->truncate();
    }
}
