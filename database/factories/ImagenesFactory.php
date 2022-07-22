<?php

namespace Database\Factories;
use App\Models\Imagenes;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Imagenes>
 */
class ImagenesFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
       return [
            'url' => 'posts/' . $this->faker->image('public/storage/posts', 640, 480, null, false)//public/storage/posts'Imgen.jpg
        ];

        
        
    }
}
