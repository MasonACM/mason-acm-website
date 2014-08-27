<?php

use MasonACM\Models\Post;
use MasonACM\Models\Thread;

class ForumTest extends TestCase {

	/**
	 * Create post model(s)
	 */
	private function createThreadAndPost($postCount = 1)
	{
		$thread = Thread::createAndValidate([
			'title' => $this->fake->text(10),
			'topic_id' => 1
		]);

		$posts = [];

		foreach (range(1, $postCount) as $index)
		{
			Post::createAndValidate([
				'body' => $this->fake->text(20),
				'thread_id' => $thread->id,
				'user_id' => 1
			]);
		}

		$posts = Post::whereThreadId($thread->id);

		return $postCount <= 1 ? $posts->first() : $posts;
	}

} 