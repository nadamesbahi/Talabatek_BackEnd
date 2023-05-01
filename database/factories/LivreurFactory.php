<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Livreur>
 */
class LivreurFactory extends Factory
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
            'prenom'=>$this->faker->firstName,
            'telephone'=>$this->faker->phoneNumber,
            'email'=>$this->faker->safeEmail,
            'mot_de_passe'=>Str::random(8),
            'matricule'=>Str::random(8),
            'adresse'=>$this->faker->address,
            'photo'=>$this->faker->imageUrl(640,480),
            'status'=>$this->faker->randomElement([
                "en livrer",
                "non livrer",
            ]),
            'etat'=>$this->faker->randomElement([
                "bloquer",
                "non bloquer",
            ]),
            'idCommande'=>$this->faker->numberBetween(1,8),
            'idCommentaire'=>$this->faker->numberBetween(1,5)
        ];
    }
}
