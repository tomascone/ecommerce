<?php

namespace Database\Seeders;

use App\Models\InformacionCliente;
use App\Models\User;
use Illuminate\Database\Seeder;

class InformacionClienteSeeder extends Seeder
{
    /**
     * Seed the application's customer information.
     */
    public function run(): void
    {
        $generos = ['Hombre', 'Mujer', 'Prefiero no decir', 'Otro'];

        User::all()->each(function (User $user) use ($generos) {
            if ($user->informacionCliente()->exists()) {
                return;
            }

            InformacionCliente::create([
                'user_id' => $user->id,
                'genero' => $generos[array_rand($generos)],
                'fecha_nacimiento' => now()->subYears(rand(18, 60))->subDays(rand(0, 365)),
            ]);
        });
    }
}
