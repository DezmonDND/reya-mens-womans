<?php
get_header();
/**
 * Template Name: Authors Page
 */
?>

<?php
$page_id = get_the_ID();
$posts = get_posts(array(
    'numberposts' => -1,
    'orderby' => 'menu_order',
    'order' => 'ASC',
    'post_type' => 'post',
    'suppress_filters' => true,
));
$authors = get_terms([
    'taxonomy' => 'author',
    'hide_empty' => false,
    'orderby' => 'name',
    'order' => 'DESC',
]);
$categories = get_categories([
    'hide_empty' => true,
    'orderby'      => 'id',
    'order'        => 'ASC',
]);
?>

<!-- Подключение Тэги, Бегущая строка, смена фона -->
<?php require __DIR__ . '/components/tag-links.php' ?>
<?php $unique_class = get_field('gradient_content_chooser', $page_id) == 'instagram' ? ' insta' : ' posts-list'; ?>
<div class="authors__runnig-row">
    <?php require __DIR__ . '/components/running-row.php' ?>
</div>

<section class="authors">
    <?php require __DIR__ . '/components/top-links.php' ?>
    <div class="authors__container">
        <h1 class="authors__title">АВТОРЫ</h1>
        <div class="authors__tags">
            <?php foreach ($authors as $author) { ?>
                <button
                    class="authors__button"
                    data-taxonomy="author"
                    data-taxonomy-terms="<?php echo $author->slug; ?>"
                    data-taxonomy-operator="IN">
                    <?php echo $author->name; ?>
                </button>
            <?php } ?>
        </div>
        <?php
        if (!empty($authors) && !is_wp_error($authors)) {
            foreach ($authors as $author) {
                $name = get_term_meta($author->term_id, 'name', true);
                $nickname = get_term_meta($author->term_id, 'nickname', true);
                $specialty = get_term_meta($author->term_id, 'specialty', true);
                $education = get_term_meta($author->term_id, 'education', true);
                $quote = get_term_meta($author->term_id, 'quote', true);
                $fullname = $name;
                if (!empty($nickname)) {
                    $fullname = $name . ' (псевдоним ' . $nickname . ')';
                }
        ?>
                <?php require __DIR__ . '/components/author-full-card.php' ?>
        <?php
            }
        }
        ?>
    </div>

    <!-- Статьи -->
    <div class="container main-posts publications">
        <?php
        echo do_shortcode('[ajax_load_more 
        id="posts-grid" 
        container_type="div" 
        css_classes="posts-grid" 
        post_type="post" 
        post_status="publish" 
        posts_per_page="8" 
        order="ASC" 
        orderby="menu_order" 
        images_loaded="true" 
        transition="masonry" 
        masonry_selector=".grid-item" 
        button_label="Ещё статьи"]'); ?>
    </div>
</section>

<!-- Подключение формы 'Подписаться' -->
<?php require __DIR__ . '/forms/subscribe.php' ?>

<?php get_footer(); ?>

<script>
    jQuery(document).ready(function($) {
        $('.publications').hide();
        $('.authors__button').on('click', function() {
            let filterValue = $(this).data('taxonomy-terms');
            if (filterValue) {
                $('.publications').show();
            } else {
                $('.publications').hide();
            }
        });
    });

    document.addEventListener('DOMContentLoaded', function() {
        const authorButtons = document.querySelectorAll('.authors__button');
        const authorCards = document.querySelectorAll('.authors__content');

        authorButtons.forEach(button => {
            button.addEventListener('click', function() {
                const selectedAuthor = this.getAttribute('data-taxonomy-terms');
                authorCards.forEach(card => card.style.display = 'none');

                if (selectedAuthor.length !== 0) {
                    document.querySelectorAll(`.authors__content[data-author-slug="${selectedAuthor}"]`).forEach(card => {
                        card.style.display = 'grid';
                    });
                }
            });
        });
    });
</script>