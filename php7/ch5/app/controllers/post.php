<?php

/**
 * Write Form for a new Post (GET)
 */
function create()
{
    return view('post', [ 'requestUrl' => '/post/write' ]);
}

/**
 * Write a new Post (POST)
 */
function store()
{
    return base(function ($_, $args) {
        return createPost(
            $_SESSION['user']['id'],
            $args['title'],
            $args['content'],
            date('Y-m-d H:i:s', time())
        ) && redirect('/');
    });
}

/**
 * Read a Post by a post id (GET)
 *
 * @param int $id
 */
function show($id)
{
    return base(function ($post) {
        return view('read', array_merge(
            $post,
            first("SELECT username FROM users WHERE id = ?", $post['user_id'])
        ));
    }, $id);
}

/**
 * Update Form for Post informations (GET)
 *
 * @param int $id
 */
function edit($id)
{
    return base(function ($post) {
        return owner($post['id']) && view('post', array_merge($post, [
            'requestUrl' => '/post/update?id=' . $post['id']
        ]));
    }, $id);
}

/**
 * Update for Post informations (POST)
 *
 * @param int $id
 */
function update($id)
{
    return base(function ($post, $args) {
        return owner($post['id']) &&
            updatePost($post['id'], ...array_values($args)) &&
            redirect('/post/read?id=' . $post['id'])
        ;
    }, $id);
}

/**
 * Delete a Post (GET)
 *
 * @param int $id
 */
function destory($id)
{
    return base(function ($post) {
        return owner($post['id']) && deletePost($post['id']) && redirect('/');
    }, $id);
}

/**
 * @param callback $callback
 * @param int $id
 *
 * @return bool|void
 */
function base($callback, $id = null)
{
    $args = filter_input_array(INPUT_POST, [
        'title'     => FILTER_SANITIZE_FULL_SPECIAL_CHARS,
        'content'   => FILTER_DEFAULT
    ]);
    if ($id) {
        $post = first("SELECT * FROM posts WHERE id = ?", filter_var($id, FILTER_VALIDATE_INT));
        if (empty($post)) {
            return reject(404);
        }
    }
    return call_user_func($callback, $post ?? [], $args) ?: reject();
}
