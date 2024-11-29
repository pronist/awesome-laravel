<?php

namespace App\Services;

use App\Post;

class PostService
{
    /**
     * Write a post
     *
     * @param Post $post
     */
    public static function write($post)
    {
        return $post->create();
    }

    /**
     * Update a post
     *
     * @param Post $post
     */
    public static function update($post)
    {
        return $post->update();
    }

    /**
     * Delete a post
     *
     * @param Post $post
     */
    public static function delete($post)
    {
        return $post->delete();
    }
}
