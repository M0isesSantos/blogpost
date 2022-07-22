<?php

namespace Database\Factories;

use App\Models\Categorias;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Posts>
 */
class PostsFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {

        $titulo = $this->faker->unique()->sentence();
        $email = $this->faker->unique()->sentence();

        return [
            //
            'titulo' => $titulo,
            'email' => $email,
            'slug' => Str::slug($titulo),
            'contenido' => $this->faker->text(1000),

            'status' => $this->faker->randomElement([1,2]),

            'categoria_id' => Categorias::all()->random()->id,
            'user_id' => User::all()->random()->id



        ];
    }
}
