<?php

namespace Database\Factories;
use Illuminate\Support\Str;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Restaurant>
 */
class RestaurantFactory extends Factory
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
            'nom'=>$this->faker->lastName,
            'telephone'=>$this->faker->phoneNumber,
            'email'=>$this->faker->safeEmail,
            'mot_de_passe'=>Str::random(8),
            'adresse'=>$this->faker->address,
            'photo'=>$this->faker->imageUrl(640,480),
            'etat'=>$this->faker->randomElement([
                "bloquer",
                "non bloquer",
            ]),
            'idReservation'=>$this->faker->numberBetween(1,8),
            'idPlat'=>$this->faker->numberBetween(1,5),
            'idCommentaire'=>$this->faker->numberBetween(1,5)
        ];
    }
}
