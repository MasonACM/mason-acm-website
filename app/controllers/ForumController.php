<?php

class ForumController extends BaseController {

	public function getIndex() 
	{
		return View::make('forum.index');
	}

	/* Topics */
	public function getCreateTopic()
	{
		return View::make('forum.createTopic');
	}

	public function postCreateTopic()
	{
		$topic = new ForumTopic;
		$topic->fill(Input::all());
		$topic->save();
		return Redirect::to('forum');
	}

	public function getTopic($id)
	{
		$topic = ForumTopic::findOrFail($id);

		return View::make('forum.topic')->with('topic', $topic);
	}

	/* Threads */
	public function getThread($id)
	{
		$thread = ForumThread::findOrFail($id);
		$posts = $thread->posts();

		return View::make('forum.thread', compact('thread', 'posts'));
	}

	public function getCreateThread($topic_id)
	{
		return View::make('forum.createThread')->with('topic_id', $topic_id);
	}

	public function postCreateThread()
	{
		$thread = new ForumThread;
		$thread->title = Input::get('title');
		$thread->updated_at = time();
        $thread->created_at = time();
		$thread->author_id = Auth::user()->id;
		$thread->topic_id = Input::get('topic_id');
		$thread->save();

		$post = new ForumPost;
		$post->body = Input::get('body');
		$post->thread_id = $thread->id;
		$post->author_id = Auth::user()->id;
		$post->save();

		return Redirect::to('forum/thread/' . $thread->id);
	}

	/* Posts */
	public function postCreatePost()
	{
		$post = new ForumPost;
		$post->body = Input::get('body');
		$post->thread_id = Input::get('thread_id');
		$post->author_id = Auth::user()->id;
		$post->updated_at = time();
        $post->created_at = time();
		$post->save();

		return Redirect::to('forum/thread/' . $post->thread_id);
	}

}