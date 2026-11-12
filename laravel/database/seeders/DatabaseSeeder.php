<?php

namespace Database\Seeders;

use App\Models\Chirp;
use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        $user = User::factory()->create([
            'name' => 'Danielius Bauza',
            'email' => 'danielius@example.com',
        ]);

        $user->chirps()->create(['message' => 'Sveiki, tai mano pirmas chirp!']);
        $user->chirps()->create(['message' => 'Laravel mokytis tikrai smagu.']);

        Chirp::create(['message' => 'Tai anoniminis chirp.']);
    }
}