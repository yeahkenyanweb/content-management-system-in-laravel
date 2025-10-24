<?php

namespace Database\Seeders;

use App\Models\Comments;
use App\Models\Posts;
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

        // User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // // ]);
        // User::factory(10)->hasPosts(5)->create();
        // Posts::factory(10)->hasComments(5)->create([
        //     'comments' => Comments::factory(5),
        //     'user_id' => User::factory(),
        // ]);
    }
}
