<?php

require_once dirname(__DIR__) . '/bootstrap/app.php';

$email = filter_input(INPUT_POST, 'email', FILTER_VALIDATE_EMAIL, FILTER_SANITIZE_EMAIL);
$password = filter_input(INPUT_POST, 'password');
$token = filter_input(INPUT_POST, 'token');

if ($email && $password && hash_equals($token, $_SESSION['CSRF_TOKEN'])) {
    $stmt = mysqli_prepare(
        $GLOBALS['DB_CONNECTION'],
        'SELECT * FROM users WHERE email = ? LIMIT 1'
    );
    mysqli_stmt_bind_param($stmt, 's', $email);
    if (mysqli_stmt_execute($stmt)) {
        $user = mysqli_fetch_assoc(mysqli_stmt_get_result($stmt));
    }
    mysqli_stmt_close($stmt);

    if ($user) {
        if (password_verify($password, $user['password'])) {
            $_SESSION['user'] = $user;
            return header('Location: /');
        }
    }
}
return header('Location: /auth/login.php');
