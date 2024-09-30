<?php
// Зарегистрировать запись Статьи
function register_publications_post_type()
{
    $labels = array(
        'name'                  => _x('Статьи', 'Post Type General Name', 'textdomain'),
        'singular_name'         => _x('Статья', 'Post Type Singular Name', 'textdomain'),
        'menu_name'             => __('Статьи', 'textdomain'),
        'name_admin_bar'        => __('Новую статью', 'textdomain'),
        'add_new'               => __('Добавить статью', 'textdomain'),
        'add_new_item'          => __('Добавить новую статью', 'textdomain'),
        'new_item'              => __('Новую статью', 'textdomain'),
        'edit_item'             => __('Редактировать данные статьи', 'textdomain'),
        'all_items'             => __('Все статьи', 'textdomain'),
        'search_items'          => __('Искать статьи', 'textdomain'),
        'parent_item_colon'    => __('Parent Person:', 'textdomain'),
        'not_found'             => __('Статьи не найдены.', 'textdomain'),
        'not_found_in_trash'    => __('В корзине ничего нет.', 'textdomain'),
    );

    $args = array(
        'labels'                => $labels,
        'description'           => __('Publications', 'textdomain'),
        'public'                => true,
        'publicly_queryable'    => true,
        'show_ui'               => true,
        'show_in_menu'          => true,
        'query_var'             => true,
        'rewrite'              => array('slug' => 'publications'),
        'capability_type'        => 'post',
        'has_archive'           => true,
        'hierarchical'          => false,
        'menu_position'         => 5,
        'supports'              => array('title', 'thumbnail', ''),
        'taxonomies'          => array('category'),
        'show_in_rest'         => true,
    );
    register_post_type('publications', $args);
}
add_action('init', 'register_publications_post_type');

// Добавть метабокс на страницу
function add_publications_meta_box()
{
    add_meta_box(
        'publications_meta_box',
        __('Информация о статье', 'publications'),
        'show_publications_meta_box',
        'publications',
        'normal',
        'high'
    );
}
add_action('add_meta_boxes', 'add_publications_meta_box');

// Добавит разметку и инпуты сбора значений
function show_publications_meta_box($post)
{
    wp_nonce_field('publications_meta_box_nonce', 'publications_meta_box_nonce');

    // Получить значение и записать в переменные
    $author = get_post_meta($post->ID, 'publication_author', true);
    $shape = get_post_meta($post->ID, 'publication_shape', true);
    $name = get_post_meta($post->ID, 'publication_title', true);
    $link = get_post_meta($post->ID, 'publication_link', true);
    $type = get_post_meta($post->ID, 'publication_type', true);
    $description = get_post_meta($post->ID, 'publication_description', true);
    $cover = get_post_meta($post->ID, 'publication_cover', true);

?>
    <div class="publications_metabox">
        <style scoped>
            .publications_metabox {
                display: grid;
                grid-template-columns: max-content 1fr;
                grid-row-gap: 10px;
                grid-column-gap: 20px;
            }

            .publications_field {
                display: contents;
            }

            .publications_iamge {
                width: 200px;
            }
        </style>
        <p class="meta-options publications_field">
            <label for="publication_author">Автор публикации</label>
            <input id="publication_author"
                type="text"
                name="publication_author"
                value="<?php echo esc_attr($author); ?>">
        </p>
        <p class="meta-options publications_field">
            <label for="publication_shape">Форма картинки</label>
            <input id="publication_shape"
                type="text"
                name="publication_shape"
                value="<?php echo esc_attr($shape); ?>">
        </p>
        <p class="meta-options publications_field">
            <label for="publication_title">Название статьи</label>
            <input id="publication_title"
                type="text"
                name="publication_title"
                value="<?php echo esc_attr($name); ?>">
        </p>
        <p class="meta-options publications_field">
            <label for="publication_link">Ссылка на статью</label>
            <input id="publication_link"
                type="url"
                name="publication_link"
                value="<?php echo esc_attr($link); ?>">
        </p>
        <p class="meta-options publications_field">
            <label for="publication_type">Тип статьи</label>
            <input id="publication_type"
                type="text"
                name="publication_type"
                value="<?php echo esc_attr($type); ?>">
        </p>
        <p class="meta-options publications_field">
            <label for="publication_description"><?php _e('Краткое описание:', 'textdomain'); ?></label>
            <textarea name="publication_description" id="publication_description" rows="5"><?php echo esc_textarea($description); ?></textarea>
        </p>
        <label for="author_avatar"><?php _e('Фотография:', 'textdomain'); ?></label>
        <input type="hidden" name="publication_cover" id="publication_cover" value="<?php echo esc_attr($cover); ?>">
        <button class="button" id="upload_publication_cover"><?php _e('Загрузить изображение статьи', 'textdomain'); ?></button>
        <?php if ($cover) : ?>
            <img style="width: 200px;" class="publication_image" src="<?php echo wp_get_attachment_url($cover); ?>" id="publication_cover_preview" />
            <a href="#" id="remove_publication_cover" class="button"><?php _e('Удалить изображение', 'textdomain'); ?></a>
        <?php endif; ?>
    </div>
    </div>
<?php
    require __DIR__ . '/../scripts/addPiblicationCoverButton.php';
}

// Сохранение данных
function save_publications_meta_box($post_id)
{
    if (! isset($_POST['publications_meta_box_nonce']) || ! wp_verify_nonce($_POST['publications_meta_box_nonce'], 'publications_meta_box_nonce')) {
        return;
    }
    if (defined('DOING_AUTOSAVE') && DOING_AUTOSAVE) {
        return;
    }
    if (! current_user_can('edit_post', $post_id)) {
        return;
    }
    if (isset($_POST['publication_author'])) {
        update_post_meta($post_id, 'publication_author', sanitize_text_field($_POST['publication_author']));
    }
    if (isset($_POST['publication_shape'])) {
        update_post_meta($post_id, 'publication_shape', sanitize_text_field($_POST['publication_shape']));
    }
    if (isset($_POST['publication_title'])) {
        update_post_meta($post_id, 'publication_title', sanitize_text_field($_POST['publication_title']));
    }
    if (isset($_POST['publication_link'])) {
        update_post_meta($post_id, 'publication_link', sanitize_url($_POST['publication_link']));
    }
    if (isset($_POST['publication_type'])) {
        update_post_meta($post_id, 'publication_type', sanitize_text_field($_POST['publication_type']));
    }
    if (isset($_POST['publication_description'])) {
        update_post_meta($post_id, 'publication_description', sanitize_textarea_field($_POST['publication_description']));
    }
    if (isset($_POST['publication_cover'])) {
        update_post_meta($post_id, 'publication_cover', intval($_POST['publication_cover']));
    }
}
add_action('save_post_publications', 'save_publications_meta_box');
