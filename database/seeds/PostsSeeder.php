<?php

use App\Post;
use Illuminate\Database\Seeder;

class PostsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(Post::class, 100)->create()->each(function(Post $post){
            $post->tags()->attach([
                rand(1,5),
                rand(6,10),
                rand(10,20),
            ]);
        });
    }
}
