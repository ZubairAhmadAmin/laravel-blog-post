<?php

namespace Database\Seeders;

use App\Models\About;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class AboutSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        About::create(['title'=>'Aboute Me', 'sub_title'=>'Lorem ipsum dolor', 'description'=>'Lorem ipsum dolor sit amet consectetur adipisicing elit. Laborum iusto necessitatibus consequatur assumenda tenetur praesentium molestiae enim, earum optio quia culpa illum suscipit itaque laboriosam ab non. Sed, nihil nesciunt?
        Lorem ipsum dolor sit amet consectetur adipisicing elit. Laborum iusto necessitatibus consequatur assumenda tenetur praesentium molestiae enim, earum optio quia culpa illum suscipit itaque laboriosam ab non. Sed, nihil nesciunt?
        Lorem ipsum dolor sit amet consectetur adipisicing elit. Laborum iusto necessitatibus consequatur assumenda tenetur praesentium molestiae enim, earum optio quia culpa illum suscipit itaque laboriosam ab non. Sed, nihil nesciunt?
        Lorem ipsum dolor sit amet consectetur adipisicing elit. Laborum iusto necessitatibus consequatur assumenda tenetur praesentium molestiae enim, earum optio quia culpa illum suscipit itaque laboriosam ab non. Sed, nihil nesciunt?']);
    }
}
