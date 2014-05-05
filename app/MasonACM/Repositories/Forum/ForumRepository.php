<?php namespace MasonACM\Repositories\Forum;

use Auth;
use \ForumPost;
use \ForumThread;
use \ForumTopic;

class ForumRepository implements ForumRepositoryInterface {

    /**
     * Finds a post by its ID
     *
     * @param  int $id
     * @return ForumPost $post
     */
    public function findPostById($id)
    {
        $post = ForumPost::find($id);

        if ($post == null) return false;

        return $post;
    }

    /**
     * Delete a post by its ID
     *
     * @param  int $id
     * @return bool
     */
    public function deletePost($id)
    {
        $post = $this->findPostById($id);

        if (!$post) return false;

        // Delete thread if this is the only post
        if ($post->thread->replies() == 0) {
            $this->deleteThread($post->thread_id);
        }

        $post->delete();

        return true;
    }

    /**
     * Creates a post
     *
     * @param  array $input
     * @return ForumPost
     */
    public function createPost($input)
    {
        $post = new ForumPost;
        $post->author_id = auth::user()->id;
        $post->fill($input);
        $post->save();

        return $post;
    }

    /**
     * Get a specific amount of posts
     *
     * @param int $thread_id
     * @param int $perPage
     * @return Pageinator
     */
    public function paginatePosts($thread_id, $perPage)
    {
        return $this->findThreadById($thread_id)->getPosts()->paginate($perPage);
    }

    /**
     * creates a new thread and its corrosponding first post
     *
     * @param  array $input
     * @return forumthread
     */
    public function createThread($input)
    {
        $thread = new ForumThread;
        $thread->author_id = Auth::user()->id;
        $thread->fill($input);
        $thread->save();

        // Prepare the input to be used to create a post
        unset($input['topic_id']);
        unset($input['title']);
        $input['thread_id'] = $thread->id;
        $this->createPost($input);

        return $thread;
    }

    /**
     * Get a specified thread
     *
     * @param  $id
     * @return mixed
     */
    public function findThreadById($id)
    {
        $thread = ForumThread::find($id);

        if ($thread == null) return false;

        return $thread;
    }

    /**
     * Delete a thread by its ID
     *
     * @param  int $id
     * @return bool
     */
    public function deleteThread($id)
    {
        $thread = $this->findThreadById($id);

        if (!$thread) return false;

        $thread->posts()->delete();

        $thread->delete();

        return true;
    }

    /**
     * Get paginated threads from a specified topic
     *
     * @param int $topic_id
     * @param int $perPage
     * @return Paginator
     */
    public function paginateThreads($topic_id, $perPage)
    {
        $topic = $this->findTopicById($topic_id);

        return $topic->getThreads()->paginate($perPage);
    }

    /**
     * Create a new topic
     *
     * @param  array $input
     * @return ForumTopic
     */
    public function createTopic($input)
    {
        $topic = new ForumTopic;

        $topic->fill($input);

        $topic->save();

        return $topic;
    }

    /**
     * Find a topic by its ID
     *
     * @param  int $id
     * @return bool
     */
    public function findTopicById($id)
    {
        $topic = ForumTopic::find($id);

        if ($topic == null) return false;

        return $topic;

    }

    /**
     * Delete a specified topic
     *
     * @param  int $id
     * @return bool
     */
    public function deleteTopic($id)
    {
        if ( ! $topic = $this->findTopicById($id)) return false;

        foreach ($topic->threads as $thread)
        {
            $this->deleteThread($thread->id);
        }

        return true;
    }

    /**
     * Update a specified topic
     *
     * @param  int $id
     * @param  array $input
     * @return bool
     */
    public function updateTopic($id, $input)
    {
        if ( ! $topic = $this->findTopicById($id)) return false;

        $topic->fill($input);

        $topic->save();

        return $topic;
    }


}