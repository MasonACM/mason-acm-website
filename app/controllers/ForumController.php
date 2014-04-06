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
		$threads = $topic->threads()->paginate(10);

		return View::make('forum.topic', compact('topic', 'threads'));
	}

	/* Threads */
	public function getThread($id)
	{
		$thread = ForumThread::findOrFail($id);
		$topic = $thread->topic();
		$posts = $thread->posts()->paginate(8);
		$user = Auth::user();

		return View::make('forum.thread', compact('thread', 'posts', 'topic', 'user'));
	}

	public function getCreateThread($topic_id)
	{
		return View::make('forum.createThread')->with('topic_id', $topic_id);
	}

	public function postCreateThread()
	{
		$thread = new ForumThread;
		$thread->title = basic_html(Input::get('title'));
		$thread->author_id = Auth::user()->id;
		$thread->topic_id = Input::get('topic_id');
		$thread->save();

		$post = new ForumPost;
		$post->body = basic_html(Input::get('body'));
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
		$post->save();

		return Redirect::to('forum/thread/' . $post->thread_id);
	}

	public function postDeletePost($id)
	{	
		$user = Auth::user();
		$post = ForumPost::findOrFail($id);
		$thread = $post->thread()->first();

		if(!$user->isAdmin() || $post->author_id != $user->id)
			App::abort(404);
		$post->delete();

		// Delete the thread if there are no more posts
		if($thread->posts()->get()->count() == 0) {
			$thread->delete();
			return Redirect::to('forum');
		}
		return Redirect::to('forum/thread/' . $thread->id);
	}

	public function postDeleteThread($id)
	{
		$thread = ForumThread::findOrFail($id);

		if(!Auth::user()->isAdmin())
			App::abort(404);
		$thread->delete();

		return Redirect::to('forum');
	}
}