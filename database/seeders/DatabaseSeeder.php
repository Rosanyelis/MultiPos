<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Support\Str;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
        \App\Models\User::create([
            'name' => 'Ross Digital',
            'email' => 'rosanyelismendoza@gmail.com',
            'email_verified_at' => now(),
            'password' => Hash::make('admin'), // password
            'remember_token' => Str::random(10),
        ]);
        \App\Models\User::create([
            'name' => 'Administrador',
            'email' => 'adminisrador@example.com',
            'email_verified_at' => now(),
            'password' => Hash::make('admin!'), // password
            'remember_token' => Str::random(10),
        ]);

        $this->call([
            PaisSeeder::class,
            EstadoSeeder::class,
            GrupoSeeder::class,
        ]);
    }
}
