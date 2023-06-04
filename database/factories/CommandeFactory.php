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
                "en attente"
            ]),
            'mode_paiement'=>$this->faker->randomElement([
                "Cash",
                "Carte"
            ]),
           'date'=>$this->faker->date,
           'adresse'=>$this->faker->address(),
           'total'=>$this->faker->numberBetween(50,100)
        ];
    }
}
