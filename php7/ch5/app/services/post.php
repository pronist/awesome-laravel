<?php

/**
 * Store a post
 *
 * @param int $userId
 * @param string $title
 * @param string $content
 * @param string $createdAt
 */
function createPost($userId, $title, $content, $createdAt)
{
    return execute('INSERT INTO posts(user_id, title, content, created_at) VALUES (?, ?, ?, ?)', $userId, $title, $content, $createdAt);
}

/**
 * Update a post
 *
 * @param int $id
 * @param string $title
 * @param string $content
 *
 * @return bool
 */
function updatePost($id, $title, $content)
{
    return execute('UPDATE posts SET title = ?, content = ? WHERE id = ?', $title, $content, $id);
}

/**
 * Destory a post
 *
 * @param int $id
 *
 * @return bool
 */
function deletePost($id)
{
    return execute('DELETE FROM posts WHERE id = ?', $id);
}
