<?php

require_once dirname(__DIR__) . '/bootstrap/app.php';

if (array_key_exists('user', $_SESSION)) {
    $user = $_SESSION['user'];

    $title = filter_input(INPUT_POST, 'title', FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    $content = filter_input(INPUT_POST, 'content');
    $token = filter_input(INPUT_POST, 'token');

    $id = filter_input(INPUT_GET, 'id', FILTER_VALIDATE_INT);

    if ($id && $title && $content && hash_equals($token, $_SESSION['CSRF_TOKEN'])) {
        $stmt = mysqli_prepare(
            $GLOBALS['DB_CONNECTION'],
            'SELECT * FROM posts WHERE id = ?'
        );
        mysqli_stmt_bind_param($stmt, 'i', $id);
        if (mysqli_stmt_execute($stmt)) {
            $result = mysqli_stmt_get_result($stmt);
            [ 'user_id' => $userId ] = mysqli_fetch_assoc($result);
        }
        mysqli_stmt_close($stmt);

        if ($user['id'] == $userId) {
            $stmt = mysqli_prepare(
                $GLOBALS['DB_CONNECTION'],
                'UPDATE posts SET title = ?, content = ? WHERE id = ?'
            );
            mysqli_stmt_bind_param($stmt, 'ssi', $title, $content, $id);
            if (mysqli_stmt_execute($stmt)) {
                header('Location: /post/read.php?id=' . $id);
            } else {
                header('Location: /post/update.php?id=' . $id);
            }
            return mysqli_stmt_close($stmt);
        }
    }
    return header('Location: /post/update.php?id=' . $id);
}
return header('Location: /auth/login.php');
