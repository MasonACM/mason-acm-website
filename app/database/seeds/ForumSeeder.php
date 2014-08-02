<?php

use MasonACM\Models\Post;
use MasonACM\Models\Thread;

class ForumSeeder extends Seeder
{
    public function run()
    { 

        $threads = [
            [
                'title'     => 'This is a test thread.'
            ]
        ];

        $posts = [
            [
                'body'      => 'This is a new post.',
                'thread_id' => 1,
                'user_id'   => 1
            ]
        ];        

        foreach ($threads as $thread)
        {
            Thread::create($thread);
        } 
            
        foreach ($posts as $post)
        {
            Post::create($post);
        }
    }
}