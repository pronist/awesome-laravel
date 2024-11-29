<?php

require_once dirname(__DIR__) . '/bootstrap/app.php';

if (!array_key_exists('user', $_SESSION)) {
    return header('Location: /auth/login.php');
}
$user = $_SESSION['user'];

$_SESSION['CSRF_TOKEN'] = bin2hex(random_bytes(32));
output_add_rewrite_var('token', $_SESSION['CSRF_TOKEN']);

$id = filter_input(INPUT_GET, 'id', FILTER_VALIDATE_INT);

$stmt = mysqli_prepare(
    $GLOBALS['DB_CONNECTION'],
    'SELECT * FROM posts WHERE id = ? LIMIT 1'
);
mysqli_stmt_bind_param($stmt, 'i', $id);
if (mysqli_stmt_execute($stmt)) {
    $result = mysqli_stmt_get_result($stmt);
    [
        'user_id'   => $userId,
        'title'     => $title,
        'content'   => $content
    ] = mysqli_fetch_assoc($result);
}
mysqli_stmt_close($stmt);

if ($user['id'] != $userId) {
    return header('Location: /');
}

?>

<?php require_once dirname(__DIR__) . '/layouts/top.php'; ?>

<div id="main__form-post">
    <form action="/post/update_process.php?id=<?=$id?>"  method="POST">
        <input type="text" name="title" value="<?=$title?>"placeholder="Type a post title" class="uk-input uk-article-title">
        <hr>
        <div class="editor uk-align-center">
            <textarea name="content"></textarea>
            <div id="editor"><?=$content?></div>
        </div>
        <input type="submit" value="Submit" class="uk-button uk-button-default uk-width-1-1">
    </form>
</div>

<?php require_once dirname(__DIR__) . '/layouts/bottom.php'; ?>
