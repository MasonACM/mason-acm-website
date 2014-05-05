<?php namespace MasonACM\Repositories\Forum;

interface ForumRepositoryInterface {

    // Posts
    public function createPost($input);

    public function findPostById($id);

    public function deletePost($id);

    public function paginatePosts($thread_id, $perPage);

    // Threads
    public function createThread($input);

    public function findThreadById($id);

    public function deleteThread($id);

    public function paginateThreads($topic_id, $perPage);

    // Topics
    public function createTopic($input);

    public function findTopicById($id);

    public function deleteTopic($id);

    public function updateTopic($id, $input);
} 