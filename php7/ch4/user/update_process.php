<?php

require_once dirname(__DIR__) . '/bootstrap/app.php';

if (array_key_exists('user', $_SESSION)) {
    $user = $_SESSION['user'];

    $email = filter_input(INPUT_POST, 'email', FILTER_VALIDATE_EMAIL, FILTER_SANITIZE_EMAIL);
    $password = filter_input(INPUT_POST, 'password');
    $token = filter_input(INPUT_POST, 'token');

    if ($email && $password && hash_equals($token, $_SESSION['CSRF_TOKEN'])) {
        // pronist@naver.com -> pronist
        $username = current(explode('@', $email));
        $password = password_hash($password, PASSWORD_DEFAULT);

        $stmt = mysqli_prepare(
            $GLOBALS['DB_CONNECTION'],
            'UPDATE users SET email = ?, password = ?, username = ? WHERE id = ?'
        );
        mysqli_stmt_bind_param($stmt, 'sssi', $email, $password, $username, $user['id']);
        if (mysqli_execute($stmt)) {
            session_unset();
            session_destroy();
            header('Location: /auth/login.php');
        } else {
            header('Location: /user/update.php');
        }
        return mysqli_stmt_close($stmt);
    }
    return header('Location: /user/update.php');
}
return header('Location: /auth/login.php');
