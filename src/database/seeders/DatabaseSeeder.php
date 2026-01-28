<?php

namespace Database\Seeders;

use App\Enums\UserRole;
use App\Models\Question;
use App\Models\Response;
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
        
        User::factory(10)->create();

        User::factory()->create([
            'name' => 'Lahcen Admiin',
            'email' => 'lahcen.maskour2003@gmail.com',
            'role' => UserRole::ADMIN,
        ]);

        Question::factory(30)->create();
        Response::factory(50)->create();


    }
}
