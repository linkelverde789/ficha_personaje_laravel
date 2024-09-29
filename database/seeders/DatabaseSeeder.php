<?php

namespace Database\Seeders;

use App\Models\Usuario; // Asegúrate de usar el modelo correcto
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // Puedes descomentar la línea de abajo si deseas crear más usuarios
        // Usuario::factory(10)->create();

        Usuario::factory()->create([
            'username' => 'Test User',
            'email' => 'test@example.com',
            'password' => bcrypt('password'), // Agrega esto si es necesario
        ]);
    }
}
