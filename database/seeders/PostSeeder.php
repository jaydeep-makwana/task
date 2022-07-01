<?php

namespace Database\Seeders;

use App\Models\post;
use Faker\Factory;
use Illuminate\Database\Seeder;


class PostSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Factory::create();
        for ($i=0; $i < 100; $i++) { 
            
            $data =  new Post;
            $data->title = $faker->word(); 
            $data->genre = $faker->word(); 
            $data->tag = $faker->tld(); 
            $data->description = $faker->word(); 
            $data->image = 'photo/pexels-christina-morillo-1181275.jpg';
            $data->save();
        }
    }
}
