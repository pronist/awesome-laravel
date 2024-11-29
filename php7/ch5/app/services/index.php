<?php

/**
 * Index
 *
 * @param int $page
 * @param int $count
 *
 * @return array
 */
function getPosts($page, $count)
{
    return array_map(function ($post) {
        [ 'username' => $username ] = first('SELECT username FROM users', $post['user_id']);
        $content = filter_var(
            mb_substr(strip_tags($post['content']), 0, 200),
            FILTER_SANITIZE_FULL_SPECIAL_CHARS
        );
        $mappings = array_merge(compact('username', 'content'), [
            'created_at' => date('h:i A, M j', strtotime($post['created_at'])),
            'url'        => "/post/read?id=" . $post['id']
        ]);
        return array_merge($post, $mappings);
    }, rows("SELECT * FROM posts ORDER BY id DESC LIMIT ? OFFSET ?", $count, $page * $count));
}
