<?php

namespace Database\Seeders;

use App\Models\Tag;
use App\Models\Post;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class TagSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Tag::factory()->count(10)->create();
        Post::all()->each(function ($post) {
            $post->tags()->attach(Tag::inRandomOrder()->limit(\rand(1, 3))->pluck('id'));
        });
    }
}