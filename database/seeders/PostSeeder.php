<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Post;

class PostSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $items = [
            [ 'user_id' => 2, 'title' => 'Fusce laoreet elementum neque in gravid', 'slug' => 'Fusce-laoreet-elementum-neque-in-gravid', 'stage' => 0, 'desc' => 'Fusce laoreet elementum neque in gravida. Cras facilisis consequat est, et dapibus erat pretium eget. Sed dapibus euismod mattis.'],
            [ 'user_id' => 2, 'title' => 'Contrary to popular belief, Lorem Ipsum is', 'slug' => 'Contrary-to-popular-belief-Lorem-Ipsum-is', 'stage' => 1, 'desc' => 'Contrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical '],
            [ 'user_id' => 2, 'title' => 'There are many variations of passages', 'slug' => 'There-are-many-variations-of-passages', 'stage' => 2, 'desc' => 'There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form'],
        ];

        foreach ($items as $item) {
            Post::create($item);
        }
    }
}
