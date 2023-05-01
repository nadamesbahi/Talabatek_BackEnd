<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
        $this->call([
            ReservationSeeder::class,
            CommandeSeeder::class,
            CategorieSeeder::class,
            CommentaireSeeder::class,
            PlatSeeder::class,
            ClientSeeder::class,
            LivreurSeeder::class,
            RestaurantSeeder::class

        ]);
    }
}
