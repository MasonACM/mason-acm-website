<?php

class ForumController extends \BaseController {
	protected $layout = 'layouts.master';

	public function getIndex() 
	{
		return View::make('forum.index');
	}

	/* Topics */
	public function getNewtopic()
	{
		return View::make('forum.createTopic');
	}

	public function postCreatetopic()
	{
		$topic = new ForumTopic;
		$topic->fill(Input::all());
		$topic->save();
		return Redirect::to('forum');
	}

	public function getTopic($id)
	{
		$topic = ForumTopic::find($id);

		return View::make('forum.topic')->with('topic', $topic);
	}

	/* Threads */
	public function getThread($id)
	{
		$thread = ForumThread::find($id);

		return View::make('forum.thread')->with('thread', $thread);
	}

	public function getNewthread($topic_id)
	{
		return View::make('forum.createThread')->with('topic_id', $topic_id);
	}

	public function postCreatethread()
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
		$post->updated_at = time();
        $post->created_at = time();
		$post->save();

		//return Redirect::to('forum/thread/' . $thread->id);
		return Redirect::to('forum');
	}

	/* Posts */
	public function postCreatepost()
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