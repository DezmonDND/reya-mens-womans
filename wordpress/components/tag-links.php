<div class="header__tags">
    <a href="/posts-feed" class="header__tag-link" data-filter="*">
        <?php echo __('Все статьи'); ?>
    </a>
    <?php foreach ($categories as $category) {
        if ($category->cat_ID == 1) {
            continue;
        } ?>
        <a
            href="/posts-feed/?tag=<?php echo $category->slug; ?>"
            class="header__tag-link"
            data-filter=".<?php echo $category->slug; ?>">
            <?php echo $category->name; ?>
        </a>
    <?php } ?>
</div>