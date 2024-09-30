<?php
get_header();
/**
 * Template Name: Authors Page React
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
<?php require __DIR__ . '/components/top-links.php' ?>

<!-- Подключение React компонента -->
<?php the_content(); ?>

<!-- Подключение формы 'Подписаться' -->
<?php require __DIR__ . '/forms/subscribe.php' ?>
<?php get_footer(); ?>