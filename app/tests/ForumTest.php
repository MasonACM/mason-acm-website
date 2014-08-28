<?php

use MasonACM\Models\Post;
use MasonACM\Models\Thread;

class ForumTest extends TestCase {

	/**
	 * @var Post
	 */
	private $post;

	/**
	 * @var Thread
	 */
	private $thread;

	/**
	 * Set up the TestCase
	 */ 
	public function setUp()
	{
		parent::setUp();

		$this->post = new Post;

		$this->thread = new Thread;
	}

	/** @test */
	public function it_deletes_the_thread_when_the_first_post_is_deleted()
	{
		$post = $this->createThreadAndPost();

		$thread = $post->thread;

		$post->deleteWithThread();

		$this->assertNull(
			$this->thread->find($thread->id)
		);
	}

	/** @test */
	public function it_doesnt_delete_the_thread_when_deleting_not_the_first_post()
	{
		$posts = $this->createThreadAndPost(3);

		$thread = $posts->first()->thread;

		// Delete the second post
		$posts->skip(1)->first()->delete();

		$this->assertNotNull(
			$this->thread->find($thread->id)
		);
	}

	/**
	 * Create post model(s)
	 */
	private function createThreadAndPost($postCount = 1)
	{
		$posts = [];

		$thread = Thread::createAndValidate([
			'title' => $this->fake->text(10)
		]);

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