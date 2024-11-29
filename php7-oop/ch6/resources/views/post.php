<div id="main__form-post">
    <form action="<?=$requestUrl?>" method="post">
        <input type="hidden" name="_csrfToken" value="<?=$_SESSION['CSRF_TOKEN']?>">
        <?php if (isset($method)) : ?>
            <input type="hidden" name="_method" value="<?=$method?>">
        <?php endif; ?>
        <input type="text" name="title" value="<?=$post->title ?? ''?>" placeholder="Type a post title" class="uk-input uk-article-title">
        <hr>
        <div class="editor uk-align-center">
            <textarea name="content"></textarea>
            <div id="editor"><?=$post->content ?? ''?></div>
        </div>
        <input type="submit" value="Submit" class="uk-button uk-button-default uk-width-1-1">
    </form>
</div>
