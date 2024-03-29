<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Reservation>
 */
class ReservationFactory extends Factory
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
            'date_reserver'=>$this->faker->date,
            'heure'=>$this->faker->time,
            'numéro_table'=>$this->faker->numberBetween(1,15),
            'numéro_personne'=>$this->faker->numberBetween(1,15),
        ];
    }
}
