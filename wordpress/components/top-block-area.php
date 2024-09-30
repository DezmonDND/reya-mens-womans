<div class="top-block-area container">
    <div class="top-block-components-wrap">
        <?php
        $post = get_field('front_preview');
        $unique_name = get_field('header_post_name', $page_id);
        $radio_field = get_field('header_image_form', $page_id);
        ?>
        <div class="top-block-image <?php echo $radio_field; ?>">
            <a href="<?php echo get_permalink($post->ID, false); ?>">
                <div
                    class="top-block-image-itself grid-item_post-image"
                    style="background: url('<?php echo get_field('image', $post_id) ? wp_get_attachment_image_url(get_field('image', $post_id), 'buzzblogpro-782-portrait') : get_the_post_thumbnail_url($post, 'buzzblogpro-782-portrait'); ?>') center/cover no-repeat">
                </div>
            </a>
        </div>
        <div class="top-block-title">
            <a href="<?php echo get_permalink($post->ID, false); ?>">
                <h1 style="display: none;">
                    <?php echo 'Reya — медиа о женщинах и женском здоровье'; ?>
                </h1>
                <h2>
                    <?php echo $unique_name ? $unique_name : $post->post_title; ?>
                </h2>
            </a>
        </div>
        <div class="top-block-pointer">
            <div class="click-box">
                <svg width="30" height="12" viewBox="0 0 30 12" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M1 1L15 10L29 1" stroke="black" stroke-width="2" />
                </svg>
            </div>
        </div>
    </div>
</div>