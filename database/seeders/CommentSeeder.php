<?php

namespace Database\Seeders;

use App\Models\Comment;
use Illuminate\Database\Seeder;

class CommentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Create 50 top-level comments
        $parentComments = Comment::factory()->count(100)->create();

        // Create 25 nested comments
        foreach (range(1, 50) as $index) {
            Comment::factory()->create([
                'parent_id' => $parentComments->random()->id,
            ]);
        }
    }
}
