<?php

session_start();

/**
 * XSS(Cross Site Scripting).
 */
switch ($_SERVER['REQUEST_METHOD']) {
    case 'GET':
        echo <<<'HTML'
<form action="/" method="POST">
    <textarea name="content" rows=25 cols=50></textarea>
    <input type="submit">
</form>
HTML;
        break;
    case 'POST':
        // echo $_POST['content'];
        // echo htmlentities($_POST['content']);
        // echo strip_tags($_POST['content']);
        echo filter_input(INPUT_POST, 'content', FILTER_SANITIZE_FULL_SPECIAL_CHARS);
        break;
    default:
        http_response_code(404);
}
