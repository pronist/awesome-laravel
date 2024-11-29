<?php

require_once dirname(__DIR__) . '/bootstrap/app.php';

if (array_key_exists('user', $_SESSION)) {
    $user = $_SESSION['user'];

    $title = filter_input(INPUT_POST, 'title', FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    $content = filter_input(INPUT_POST, 'content');
    $token = filter_input(INPUT_POST, 'token');

    if ($title && $content && hash_equals($token, $_SESSION['CSRF_TOKEN'])) {
        $stmt = mysqli_prepare(
            $GLOBALS['DB_CONNECTION'],
            'INSERT INTO posts(user_id, title, content, created_at) VALUES(?, ?, ?, ?)'
        );
        $createdAt = date('Y-m-d H:i:s', time());

        mysqli_stmt_bind_param($stmt, 'isss', $user['id'], $title, $content, $createdAt);
        if (mysqli_stmt_execute($stmt)) {
            header('Location: /');
        } else {
            header('Location: /post/write.php');
        }
        return mysqli_stmt_close($stmt);
    }
}
return header('Location: /auth/login.php');
