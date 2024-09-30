<div class="authors__content" data-author-slug="<?php echo $author->slug; ?>">
    <?php
    $image_url = null;
    if (function_exists('z_taxonomy_image_url')) {
        $image_url = z_taxonomy_image_url($author->term_id);
    }
    if ($image_url && !empty($image_url)) {
    ?>
        <img class="authors__photo" src="<?= $image_url ?>" />
        <div class="authors__info">
            <div class="authors__biography">
                <h2 class="authors__name">
                    <?php echo esc_html($fullname); ?>
                </h2>
                <p class="authors__job"><?php echo esc_html($specialty); ?></p>
                <p class="authors__education"><?php echo esc_html($education); ?></p>
            </div>
        </div>
        <p class="authors__quote"><?php echo esc_html($quote); ?></p>
    <?php
    }
    ?>
</div>