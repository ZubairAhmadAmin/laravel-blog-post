<?php

namespace Database\Seeders;

use App\Models\Permission;
use App\Models\Post;
use App\Models\Role;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
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
        // Post::factory(30)->create();
        // \App\Models\User::factory(10)->create();

        $this->call([
            PermissionSeeder::class,
            SettingSeeder::class,
            TopicSeeder::class,
            AboutSeeder::class,
            RoleSeeder::class,
            UserSeeder::class,
        ]);
    }
}