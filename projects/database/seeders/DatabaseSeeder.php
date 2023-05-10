<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\Category;
use App\Models\Post;
use Illuminate\Database\Seeder;

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

        Category::factory()->create();
        Category::factory()
            ->count(6)
            ->create()
            ->each(function (Category $catalog) {
                Category::factory()
                    ->count(rand(1, 5))
                    ->withRandomParent()
                    ->create();
            });

        Post::factory()->count(20)
            ->create();
    }
}
