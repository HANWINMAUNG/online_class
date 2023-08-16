<?php

namespace Database\Seeders;


use Illuminate\Database\Seeder;
use Database\Seeders\PermissionSeeder;
use Database\Seeders\SuperAdminSeeder;

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
         \App\Models\Course::factory(20)->create();
         \App\Models\Episode::factory(20)->create();

         $this->call(PermissionSeeder::class);
         $this->call(SuperAdminSeeder::class);

    }
}
