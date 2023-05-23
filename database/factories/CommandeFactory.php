<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Commande>
 */
class CommandeFactory extends Factory
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
            'etat'=>$this->faker->randomElement([
                "accepter",
                "annuler",
            ]),
            'mode_paiement'=>$this->faker->randomElement([
                "visa",
                "master card",
            ]),
           'date'=>$this->faker->date,
           'adresse'=>$this->faker->address(),
           'total'=>$this->faker->numberBetween(50,250),
        ];
    }
}
