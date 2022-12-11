<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Sequence;

class UserSeeder extends Seeder {

    const ADMIN_COUNT = 5;
    const BLOCKED_COUNT = 25;
    const NORMAL_COUNT = 60;

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run() {
        User::factory()->admin()->state(new Sequence(
            fn ($sequence) => [ 'email' => "admin$sequence->index@example.com" ]
        ))->count(UserSeeder::ADMIN_COUNT)->create();
        User::factory()->count(UserSeeder::NORMAL_COUNT)->state(new Sequence(
            fn ($sequence) => [ 'email' => "user$sequence->index@example.com" ]
        ))->create();
        User::factory()->blocked()->count(UserSeeder::BLOCKED_COUNT)->state(new Sequence(
            fn ($sequence) => [ 'email' => "blocked$sequence->index@example.com" ]
        ))->create();
    }
}
