<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;

    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        $this->call(RoleSeeder::class);

        $user = User::factory()->create([
            'nombre' => 'Test',
            'apellido' => 'Admin',
            'email' => 'test@example.com',
        ]);

        $user->assignRole('SuperAdmin');

        $this->call(InformacionClienteSeeder::class);
    }
}
