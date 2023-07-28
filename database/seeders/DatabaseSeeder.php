<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
         \App\Models\User::factory(20)->create();
         \App\Models\Admin::factory(20)->create();
         \App\Models\Instructor::factory(20)->create();
         \App\Models\Category::factory(20)->create();

    }
}
