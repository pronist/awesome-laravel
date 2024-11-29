<?php

require_once dirname(__DIR__) . '/bootstrap/app.php';

if (!array_key_exists('user', $_SESSION)) {
    return header('Location: /auth/login.php');
}

$_SESSION['CSRF_TOKEN'] = bin2hex(random_bytes(32));
output_add_rewrite_var('token', $_SESSION['CSRF_TOKEN']);

$user = $_SESSION['user'];

?>

<?php require_once dirname(__DIR__) . '/layouts/top.php'; ?>

<div id="main__form-auth" class="uk-padding uk-position-fixed uk-position-center">
    <form action="/user/update_process.php" method="POST">
        <input type="text" name="email" value="<?=$user['email']?>" placeholder="Email"  class="uk-input">
        <input type="password" name="password" placeholder="Password" class="uk-input">
        <input type="submit" value="Submit" class="uk-button uk-button-default uk-width-1-1">
    </form>
</div>

<?php require_once dirname(__DIR__) . '/layouts/bottom.php'; ?>
