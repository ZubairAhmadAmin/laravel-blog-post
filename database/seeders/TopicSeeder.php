<?php

namespace Database\Seeders;

use App\Models\Topic;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class TopicSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Topic::create(['title'=>'Web Development']);
        Topic::create(['title'=>'Mobile App Development']);
        Topic::create(['title'=>'Disktop App Development']);
        Topic::create(['title'=>'Software Engineer']);
        Topic::create(['title'=>'Technology']);
    }
}
