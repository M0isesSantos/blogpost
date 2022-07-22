<?php

namespace Database\Seeders;

use App\Models\Categorias;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

use Illuminate\Support\Facades\Storage;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        //\App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
        Storage::deleteDirectory('public/posts');
        Storage::makeDirectory('public/posts');

        $this->call(UserSeeder::class);
        Categorias::factory(4)->create();
        $this->call(PostsSeeder::class);

        


    }
}
