<?php

namespace Database\Factories;

use App\Models\Categoria;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<Categoria>
 */
class CategoriaFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            //
            'nombre'=>$this->faker->unique()->word(),
            'descripcion'=> $this->faker->sentence(),
            'status'=>$this->faker->boolean()
            /*
              //numero entero en un rango
              'cantidad'=>$this->faker->numberBetween(1,1000),
              //numero decimal en un rango 
              'precio'=>$this->faker->randomFloat(2,1000,100000)

            */
        ];
    }
}
