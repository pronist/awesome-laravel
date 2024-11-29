<div id="main__form-auth" class="uk-padding uk-position-fixed uk-position-center">
    <form action="<?=$requestUrl?>" method="post">
        <input type="hidden" name="_csrfToken" value="<?=$_SESSION['CSRF_TOKEN']?>">
        <input type="text" name="email" value="<?=$email ?? ''?>" placeholder="Email" class="uk-input">
        <input type="password" name="password" placeholder="Password" class="uk-input">
        <input type="submit" value="Submit" class="uk-button uk-button-default uk-width-1-1">
    </form>
</div>
