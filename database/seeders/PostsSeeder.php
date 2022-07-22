<?php

namespace Database\Seeders;

use App\Models\Imagenes;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use  App\Models\Posts;

class PostsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $post = Posts::factory(300)->create();


        foreach ($post as $posts) {
            Imagenes::factory(1)->create([
                'imageable_id' => $posts->id,
                'imageable_type' => Posts::class
            ]);
        }
    }
}
