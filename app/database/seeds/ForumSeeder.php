<?php

class ForumSeeder
extends Seeder
{
    public function run()
    {
        $topics = [
            [
                'id'          => 1,
                'name'        => 'General Discussion',
                'description' => 'General topics are discussed here'
            ]
        ];

        $threads = [
            [
                'id'        => 1,
                'title'     => 'This is a test thread.',
                'topic_id'  => 1,
                'author_id' => 1
            ]
        ];

        $posts = [
            [
                'id'        => 1,
                'body'      => 'This is a new post.',
                'thread_id' => 1,
                'author_id' => 1
            ]
        ];        
        
        foreach ($topics as $topic)
        {
            ForumTopic::create($topic);
        }

        foreach ($threads as $thread)
        {
            ForumThread::create($thread);
        } 
            
        foreach ($posts as $post)
        {
            ForumPost::create($post);
        }
    }
}