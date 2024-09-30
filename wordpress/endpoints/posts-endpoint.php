<?php
// Создание эндпоинта Записи
add_action('rest_api_init', 'create_all_posts_endpoint');
function create_all_posts_endpoint()
{
    register_rest_route('myplugin/v1', '/posts', array(
        'methods'             => 'GET',
        'callback'           => 'get_all_posts',
        'permission_callback' => '__return_true',
    ));
}

function get_all_posts(WP_REST_Request $request)
{
    $args = array(
        'post_type'   => 'post',
        'posts_per_page' => -1,
    );
    $posts = get_posts($args);
    $response = array();

    foreach ($posts as $post) {

        $image = wp_get_attachment_image_url(get_field('image', $post->ID), 'full');
        $image_form = get_post_meta($post->ID, 'image_form', true);
        $title = $post->post_title;
        $post_author = get_field('post_author', $post->ID);
        $terms = get_the_terms($post->ID, 'post_tag');
        $tag = isset($terms[0]) ? $terms[0]->name : '';

        $response[] = array(
            'id' => $post->ID,
            'author' => $post_author,
            'shape' => $image_form,
            'title' => $title,
            'link' => get_permalink($post),
            'cover' => $image,
            'type' => $tag,
            'description' => $post->post_excerpt,
        );
    }
    return rest_ensure_response($response);
}
