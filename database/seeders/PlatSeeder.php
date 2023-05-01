<?php

namespace Database\Seeders;

use App\Models\Categorie;
use App\Models\Plat;
use Illuminate\Database\Seeder;

class PlatSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        Plat::factory(5)->create();

    }
}
