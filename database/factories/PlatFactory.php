<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Plat>
 */
class PlatFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            //
            'nom'=>$this->faker->word(),
            'prix'=>$this->faker->numberBetween(50,100),
            'description'=>$this->faker->slug(),
            'photo'=>$this->faker->imageUrl(640,480),
            'idCategorie'=>$this->faker->numberBetween(1,5)

        ];
    }
}
