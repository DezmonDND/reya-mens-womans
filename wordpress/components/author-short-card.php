<div class="authors__short-content" data-author-slug="<?php echo $author->slug; ?>">
    <?php
    $image_url = null;
    if (function_exists('z_taxonomy_image_url')) {
        $image_url = z_taxonomy_image_url($author->term_id);
    }
    if ($image_url && !empty($image_url)) {
    ?>
        <img class="authors__short-photo" src="<?= $image_url ?>" />
        <h5 class="authors__short-name">
            <?php echo esc_html($fullname); ?>
        </h5>
    <?php
    }
    ?>
</div>