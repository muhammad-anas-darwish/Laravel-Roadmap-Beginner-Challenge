<?php

namespace Database\Seeders;

use App\Models\Article;
use App\Models\Category;
use App\Models\Tag;
use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        // User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);

        $this->call(UserTableSeeder::class);

        Category::factory(10)->create();
        Tag::factory(20)->create();
        Article::factory(20)->create()
            ->each(function ($article) { 
                $article->tags()->attach(
                    Tag::all()->random(rand(1, 5))->pluck('id')->toArray()
                );
            });
    }
}
