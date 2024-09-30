<?php
get_header();
/**
 * Template Name: Specialists Page
 */
?>

<?php
$page_id = get_the_ID();
$specialists = get_terms([
    'taxonomy' => 'specialists',
    'hide_empty' => false,
    'orderby' => 'date',
    'order' => 'ASC',
]);
$posts = get_posts(array(
    'numberposts' => -1,
    'orderby' => 'menu_order',
    'order' => 'ASC',
    'post_type'   => 'post',
    'suppress_filters' => true,
));
$categories = get_categories([
    'hide_empty' => true,
    'orderby'      => 'id',
    'order'        => 'ASC',
]);
?>

<?php require __DIR__ . '/components/tag-links.php' ?>
<?php $unique_class = get_field('gradient_content_chooser', $page_id) == 'instagram' ? ' insta' : ' posts-list'; ?>
<div class="authors__runnig-row">
    <?php require __DIR__ . '/components/running-row.php' ?>
</div>
<section class="specialists">
    <?php require __DIR__ . '/components/top-links.php' ?>
    <h1 class="specialists__title">СПЕЦИАЛИСТЫ</h1>
    <div class="specialists__contenainer">
        <?php
        if (!empty($specialists) && !is_wp_error($specialists)) {
            foreach ($specialists as $specialist) {
                $firstName = get_term_meta($specialist->term_id, 'specialist_firstname', true);
                $secondName = get_term_meta($specialist->term_id, 'specialist_secondname', true);
                $job = get_term_meta($specialist->term_id, 'specialist_job', true);
        ?>
                <div class="specialists__content" data-specialist-slug="<?php echo $specialist->slug; ?>">
                    <?php
                    $image_url = null;
                    if (function_exists('z_taxonomy_image_url')) {
                        $image_url = z_taxonomy_image_url($specialist->term_id);
                    }
                    if ($image_url && !empty($image_url)) {
                    ?>
                        <img
                            src="<?= $image_url ?>"
                            class="specialists__image"
                            alt="<?php echo sprintf('Фотография специалиста %s', $firstName) ?>"></img>
                        <div class="specialists__info">
                            <div class="specialists__names">
                                <h2 class="specialists__name">
                                    <?php echo esc_html($firstName); ?>
                                </h2>
                                <h2 class="specialists__name">
                                    <?php echo esc_html($secondName); ?>
                                </h2>
                            </div>
                            <p class="specialists__job"><?php echo  esc_html($job); ?></p>
                        </div>
                </div>
    <?php }
                }
            } ?>
    </div>
</section>

<!-- Подключение формы 'Подписаться' -->
<?php require __DIR__ . '/forms/subscribe.php' ?>
<?php get_footer(); ?>