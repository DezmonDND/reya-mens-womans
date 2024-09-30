<?php
// Зарегистрировать новую запись Авторы
function register_all_authors_post_type()
{
    $labels = array(
        'name'                  => _x('Авторы', 'Post Type General Name', 'textdomain'),
        'singular_name'         => _x('Автор', 'Post Type Singular Name', 'textdomain'),
        'menu_name'             => __('Авторы', 'textdomain'),
        'name_admin_bar'        => __('Нового автора', 'textdomain'),
        'add_new'               => __('Добавить автора', 'textdomain'),
        'add_new_item'          => __('Добавить нового автора', 'textdomain'),
        'new_item'              => __('Нового автора', 'textdomain'),
        'edit_item'             => __('Редактировать данные автора', 'textdomain'),
        'all_items'             => __('Все авторы', 'textdomain'),
        'search_items'          => __('Искать авторов', 'textdomain'),
        'parent_item_colon'    => __('Parent Person:', 'textdomain'),
        'not_found'             => __('Авторы не найдены.', 'textdomain'),
        'not_found_in_trash'    => __('В корзине ничего нет.', 'textdomain'),
    );
    $args = array(
        'labels'                => $labels,
        'description'           => __('All authors', 'textdomain'),
        'public'                => true,
        'publicly_queryable'    => true,
        'show_ui'               => true,
        'show_in_menu'          => true,
        'query_var'             => true,
        'rewrite'              => array('slug' => 'all_authors'),
        'capability_type'        => 'post',
        'has_archive'           => true,
        'hierarchical'          => false,
        'menu_position'         => 5,
        'supports'              => array('title', 'thumbnail', ''),
        'taxonomies'          => array('category'),
        'show_in_rest'         => true,
    );
    register_post_type('all_authors', $args);
}
add_action('init', 'register_all_authors_post_type');

// Добавть метабокс на страницу
function add_all_authors_meta_box()
{
    add_meta_box(
        'all_authors_meta_box',
        __('Информация об авторе', 'all_authors'),
        'show_all_authors_meta_box',
        'all_authors',
        'normal',
        'high'
    );
}
add_action('add_meta_boxes', 'add_all_authors_meta_box');


// Добавит разметку и инпуты сбора значений
function show_all_authors_meta_box($post)
{

    wp_nonce_field('all_authors_meta_box_nonce', 'all_authors_meta_box_nonce');

    // Получить значение и записать в переменные
    $name = get_post_meta($post->ID, 'author_name', true);
    $nick = get_post_meta($post->ID, 'author_nick', true);
    $job = get_post_meta($post->ID, 'author_job', true);
    $education = get_post_meta($post->ID, 'author_education', true);
    $quote = get_post_meta($post->ID, 'author_quote', true);
    $avatar = get_post_meta($post->ID, 'author_avatar', true);

?>
    <div class="authors_metabox">
        <style scoped>
            .authors_metabox {
                display: grid;
                grid-template-columns: max-content 1fr;
                grid-row-gap: 10px;
                grid-column-gap: 20px;
            }

            .authors_field {
                display: contents;
            }

            .authors_iamge {
                width: 200px;
            }
        </style>
        <p class="meta-options authors_field">
            <label for="author_name">Имя и Фамилия</label>
            <input id="author_name"
                type="text"
                name="author_name"
                value="<?php echo esc_attr($name); ?>">
        </p>
        <p class="meta-options authors_field">
            <label for="author_nick">Псевдоним</label>
            <input id="author_nick"
                type="text"
                name="author_nick"
                value="<?php echo esc_attr($nick); ?>">
        </p>
        <p class="meta-options authors_field">
            <label for="author_job">Специальность</label>
            <input id="author_job"
                type="text"
                name="author_job"
                value="<?php echo esc_attr($job); ?>">
        </p>
        <p class="meta-options authors_field">
            <label for="author_education"><?php _e('Образование:', 'textdomain'); ?></label>
            <textarea name="author_education" id="author_education" rows="5"><?php echo esc_textarea($education); ?></textarea>
        </p>
        <p class="meta-options authors_field">
            <label for="author_quote"><?php _e('Цитата:', 'textdomain'); ?></label>
            <textarea name="author_quote" id="author_quote" rows="5"><?php echo esc_textarea($quote); ?></textarea>
        </p>
        <label for="author_avatar"><?php _e('Фотография:', 'textdomain'); ?></label>
        <input type="hidden" name="author_avatar" id="author_avatar" value="<?php echo esc_attr($avatar); ?>">
        <button class="button" id="upload_author_avatar"><?php _e('Загрузить изображение автора', 'textdomain'); ?></button>
        <?php if ($avatar) : ?>
            <img style="width: 200px;" class="authors_image" src="<?php echo wp_get_attachment_url($avatar); ?>" id="author_image_preview" />
            <a href="#" id="remove_author_avatar" class="button"><?php _e('Удалить изображение', 'textdomain'); ?></a>
        <?php endif; ?>
    </div>
    </div>
<?php
    require __DIR__ . '/../scripts/addAuthorImageButton.php';
}

// Сохранение данных
function save_all_authors_meta_box($post_id)
{
    if (! isset($_POST['all_authors_meta_box_nonce']) || ! wp_verify_nonce($_POST['all_authors_meta_box_nonce'], 'all_authors_meta_box_nonce')) {
        return;
    }
    if (defined('DOING_AUTOSAVE') && DOING_AUTOSAVE) {
        return;
    }
    if (! current_user_can('edit_post', $post_id)) {
        return;
    }
    if (isset($_POST['author_name'])) {
        update_post_meta($post_id, 'author_name', sanitize_text_field($_POST['author_name']));
    }
    if (isset($_POST['author_nick'])) {
        update_post_meta($post_id, 'author_nick', sanitize_text_field($_POST['author_nick']));
    }
    if (isset($_POST['author_job'])) {
        update_post_meta($post_id, 'author_job', sanitize_text_field($_POST['author_job']));
    }
    if (isset($_POST['author_education'])) {
        update_post_meta($post_id, 'author_education', sanitize_textarea_field($_POST['author_education']));
    }
    if (isset($_POST['author_quote'])) {
        update_post_meta($post_id, 'author_quote', sanitize_textarea_field($_POST['author_quote']));
    }
    if (isset($_POST['author_avatar'])) {
        update_post_meta($post_id, 'author_avatar', intval($_POST['author_avatar']));
    }
}
add_action('save_post_all_authors', 'save_all_authors_meta_box');
