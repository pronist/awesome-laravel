<div id="main__article" class="uk-container">
    <article class="uk-margin uk-article">
        <h1 class="uk-article-title"><?=$title?></h1>
        <div class="uk-text-meta">
            by <?=$username?>
        </div>
        <div class="uk-text-meta">
            <?=$created_at?>
            <?php if (owner($id)) : ?>
                <span class="owner">
                    <a href="/post/delete?id=<?=$id?>&token=<?=$_SESSION['CSRF_TOKEN']?>" class="uk-link-text" id="delete">Delete</a>
                    <a href="/post/update?id=<?=$id?>" class="uk-link-text" id="delete">Update</a>
                </span>
            <?php endif; ?>
        </div>
        <div class="uk-text-lead uk-margin-bottom"><?=$content?></div>
    </article>
</div>
