<?php

namespace App\Controllers;

use Eclair\Support\Theme;
use App\Services\PostService;
use App\Post;

class PostController
{
    /**
     * Write Form for a new Post (GET)
     */
    public static function create()
    {
        return Theme::view('post', [
            'requestUrl' => '/posts'
        ]);
    }

    /**
     * Write a new Post (POST)
     */
    public static function store()
    {
        $post = new Post();

        $post->title = filter_input(INPUT_POST, 'title', FILTER_SANITIZE_FULL_SPECIAL_CHARS);
        $post->content = filter_input(INPUT_POST, 'content');
        $post->user_id = $_SESSION['user']->id;

        return PostService::write($post)
            ? header('Location: /')
            : header('Location: ' . $_SERVER['HTTP_REFERER'])
        ;
    }

    /**
     * Read a Post by a post id (GET)
     *
     * @param int $id
     */
    public static function show($id)
    {
        if ($post = Post::get($id)) {
            return Theme::view('read', compact('post'));
        }

        return http_response_code(404);
    }

    /**
     * Update Form for Post informations (GET)
     *
     * @param int $id
     */
    public static function edit($id)
    {
        if ($post = Post::get($id)) {
            $post->isOwner() && Theme::view('post', [
                'post' => $post,
                'requestUrl' => '/posts/' . $post->id,
                'method' => 'patch'
            ]);
        }

        return http_response_code(404);
    }

    /**
     * Update for Post informations (PATCH)
     *
     * @param int $id
     */
    public static function update($id)
    {
        if ($post = Post::get($id)) {
            $post->title = filter_input(INPUT_POST, 'title', FILTER_SANITIZE_FULL_SPECIAL_CHARS);
            $post->content = filter_input(INPUT_POST, 'content');

            return ($post->isOwner() && PostService::update($post))
                ? header('Location: /posts/' . $post->id)
                : header('Location: ' . $_SERVER['HTTP_REFERER'])
            ;
        }

        return http_response_code(404);
    }

    /**
     * Delete a Post (DELETE)
     *
     * @param int $id
     */
    public static function destroy($id)
    {
        if ($post = Post::get($id)) {
            if ($post->isOwner() && PostService::delete($post)) {
                return http_response_code(204);
            }
        }

        return http_response_code(404);
    }
}
