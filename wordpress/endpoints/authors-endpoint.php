<?php
// Создание эндпоинта Авторы
add_action('rest_api_init', 'create_all_authors_endpoint');
function create_all_authors_endpoint()
{
    register_rest_route('myplugin/v1', '/authors', array(
        'methods'             => 'GET',
        'callback'           => 'get_all_authors',
        'permission_callback' => '__return_true',
    ));
}

function get_all_authors(WP_REST_Request $request)
{
    $authors = get_terms(array(
        'taxonomy'   => 'author',
        'hide_empty' => false,
    ));
    $response = array();

    foreach ($authors as $author) {
        $name = get_term_meta($author->term_id, 'name', true);
        $nickname = get_term_meta($author->term_id, 'nickname', true);
        $specialty = get_term_meta($author->term_id, 'specialty', true);
        $education = get_term_meta($author->term_id, 'education', true);
        $quote = get_term_meta($author->term_id, 'quote', true);
        $image_url = z_taxonomy_image_url($author->term_id);

        $response[] = array(
            'id'          => $author->term_id,
            'name'        => $name,
            'nick'    => $nickname,
            'job'   => $specialty,
            'education'   => $education,
            'quote'       => $quote,
            'avatar'       => $image_url,
        );
    }

    return rest_ensure_response($response);
}
