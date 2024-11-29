<?php

session_start();

/**
 * CSRF(Cross Site Request Forgery).
 */
switch ($_SERVER['REQUEST_METHOD']) {
    case 'GET':
        $_SESSION['token'] = bin2hex(random_bytes(32));
        output_add_rewrite_var('csrf_token', $_SESSION['token']);
        echo <<<'HTML'
<form action="/" method="POST">
    <input type="hidden" name="uid" value="1"></textarea>
    <input type="submit">
</form>
HTML;
        break;
    case 'POST':
        if (hash_equals($_SESSION['token'], $_POST['csrf_token'])) {
            $uid = $_POST['uid'];
            echo 'Hello, world';
        }
        break;
    default:
        http_response_code(404);
}
