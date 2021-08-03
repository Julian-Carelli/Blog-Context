<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Post;
use App\Models\Category;
use App\Models\CategoryUser;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'name'  => 'julian ignacio carelli',
            'email' => 'julianignaciocarelli@gmail.com',
            'is_validate' => 1,
            'password' => bcrypt('secret'),
        ]);
    }
}
