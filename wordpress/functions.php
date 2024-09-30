<?php

add_filter('manage_post_posts_columns', function ($columns) {
    return array_merge($columns, [
        'views' => __('Просмотры'),
        'post_author' => __('Автор текста')

    ]);
});

add_action('manage_post_posts_custom_column', function ($column_key, $post_id) {
    if ($column_key == 'views') {
        echo pvc_get_post_views($post_id);
    } else if ($column_key == 'post_author') {
        echo get_field('post_author', $post_id);
    }
}, 10, 2);

add_action('admin_head', 'my_admin_column_width');
function my_admin_column_width()
{
    echo '<style type="text/css">
		.column-thumbnail { text-align: left; width:100px !important; overflow:hidden }
        .column-views { text-align: left; width:80px !important; overflow:hidden }
        .column-post_author { text-align: left; width:120px !important; overflow:hidden }
    </style>';
}
// Подключение метабоксов
// require __DIR__ . '/metaboxes/authors-metabox.php';
// require __DIR__ . '/metaboxes/specialists-metabox.php';
// require __DIR__ . '/metaboxes/publications-metabox.php';

// Подключение таксономий
require __DIR__ . '/taxonomys/specialists-taxonomy.php';
require __DIR__ . '/taxonomys/authors-taxonomy.php';

// Подключение эндпоинтов
require __DIR__ . '/endpoints/posts-endpoint.php';
require __DIR__ . '/endpoints/authors-endpoint.php';
