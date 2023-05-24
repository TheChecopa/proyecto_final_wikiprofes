<?php

namespace Database\Seeders;

use App\Models\Puntuacion;
use App\Models\Calificacion;
use App\Models\Profesor;
use App\Models\User;
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
        User::factory(10)->create();
        Calificacion::factory()->count(10)->create();
        $this->call(tipomatseeder::class);
        Puntuacion::factory()->count(10)->create();
        Profesor::factory()->count(10)->create();
    }
}
