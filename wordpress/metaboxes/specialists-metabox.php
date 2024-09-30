<?php
// Зарегистрировать запись Специалисты
function register_specialists_post_type()
{
    $labels = array(
        'name'                  => _x('Специалисты', 'Post Type General Name', 'textdomain'),
        'singular_name'         => _x('Специалист', 'Post Type Singular Name', 'textdomain'),
        'menu_name'             => __('Специалисты', 'textdomain'),
        'name_admin_bar'        => __('Нового специалиста', 'textdomain'),
        'add_new'               => __('Добавить специалиста', 'textdomain'),
        'add_new_item'          => __('Добавить нового специалиста', 'textdomain'),
        'new_item'              => __('New Person', 'textdomain'),
        'edit_item'             => __('Редактировать данные специалиста', 'textdomain'),
        'view_item'             => __('Посмотреть данные специалиста', 'textdomain'),
        'all_items'             => __('Все специалисты', 'textdomain'),
        'search_items'          => __('Искать специалистов', 'textdomain'),
        'parent_item_colon'    => __('Parent Person:', 'textdomain'),
        'not_found'             => __('Специалисты не найдены.', 'textdomain'),
        'not_found_in_trash'    => __('В корзине ничего нет.', 'textdomain'),
    );

    $args = array(
        'labels'                => $labels,
        'description'           => __('Description', 'textdomain'),
        'public'                => true,
        'publicly_queryable'    => true,
        'show_ui'               => true,
        'show_in_menu'          => true,
        'query_var'             => true,
        'rewrite'              => array('slug' => 'specialists'),
        'capability_type'        => 'post',
        'has_archive'           => true,
        'hierarchical'          => false,
        'menu_position'         => 5,
        'supports'              => array('title', 'thumbnail', ''),
        'taxonomies'          => array('category'),
        'show_in_rest'         => true,
    );
    register_post_type('specialists', $args);
}
add_action('init', 'register_specialists_post_type');

// Добавть метабокс на страницу
function add_specialists_meta_box()
{
    add_meta_box(
        'specialists_meta_box',
        __('Информация о специалисте', 'specialist'),
        'show_specialists_meta_box',
        'specialists',
        'normal',
        'high'
    );
}
add_action('add_meta_boxes', 'add_specialists_meta_box');

// Добавит разметку и инпуты сбора значений
function show_specialists_meta_box($post)
{
    wp_nonce_field('specialists_meta_box_nonce', 'specialists_meta_box_nonce');

    // Получить значение и записать в переменные
    $firstName = get_post_meta($post->ID, 'specialist_firstname', true);
    $secondName = get_post_meta($post->ID, 'specialist_secondname', true);
    $job = get_post_meta($post->ID, 'specialist_job', true);
    $avatar = get_post_meta($post->ID, 'specialist_avatar', true);
?>
    <div class="specialists_metabox">
        <style scoped>
            .specialists_metabox {
                display: grid;
                grid-template-columns: max-content 1fr;
                grid-row-gap: 10px;
                grid-column-gap: 20px;
            }

            .specialists_field {
                display: contents;
            }

            .specialists_iamge {
                width: 200px;
            }
        </style>
        <p class="meta-options specialists_field">
            <label for="specialist_firstname">Имя</label>
            <input id="specialist_firstname"
                type="text"
                name="specialist_firstname"
                value="<?php echo esc_attr($firstName); ?>">
        </p>
        <p class="meta-options specialists_field">
            <label for="specialist_secondname">Фамилия</label>
            <input id="specialist_secondname"
                type="text"
                name="specialist_secondname"
                value="<?php echo esc_attr($secondName); ?>">
        </p>
        <p class="meta-options specialists_field">
            <label for="specialist_job"><?php _e('Специализация:', 'textdomain'); ?></label>
            <textarea name="specialist_job" id="specialist_job" rows="5"><?php echo esc_textarea($job); ?></textarea>
        </p>
        <label for="specialist_avatar"><?php _e('Фотография:', 'textdomain'); ?></label>
        <input type="hidden" name="specialist_avatar" id="specialist_avatar" value="<?php echo esc_attr($avatar); ?>">
        <button class="button" id="upload_specialist_avatar"><?php _e('Загрузить изображение специалиста', 'textdomain'); ?></button>
        <?php if ($avatar) : ?>
            <img class="specialists_iamge" src="<?php echo wp_get_attachment_url($avatar); ?>" id="specialist_image_preview" />
            <a href="#" id="remove_specialist_avatar" class="button"><?php _e('Удалить изображение', 'textdomain'); ?></a>
        <?php endif; ?>
    </div>
    </div>
<?php
    require __DIR__ . '/../scripts/addSpecialistImageButton.php';
}

// Сохранение данных
function save_specialists_meta_box($post_id)
{
    if (! isset($_POST['specialists_meta_box_nonce']) || ! wp_verify_nonce($_POST['specialists_meta_box_nonce'], 'specialists_meta_box_nonce')) {
        return;
    }
    if (defined('DOING_AUTOSAVE') && DOING_AUTOSAVE) {
        return;
    }
    if (! current_user_can('edit_post', $post_id)) {
        return;
    }
    if (isset($_POST['specialist_firstname'])) {
        update_post_meta($post_id, 'specialist_firstname', sanitize_text_field($_POST['specialist_firstname']));
    }
    if (isset($_POST['specialist_secondname'])) {
        update_post_meta($post_id, 'specialist_secondname', sanitize_text_field($_POST['specialist_secondname']));
    }
    if (isset($_POST['specialist_job'])) {
        update_post_meta($post_id, 'specialist_job', sanitize_textarea_field($_POST['specialist_job']));
    }
    if (isset($_POST['specialist_avatar'])) {
        update_post_meta($post_id, 'specialist_avatar', intval($_POST['specialist_avatar']));
    }
}
add_action('save_post_specialists', 'save_specialists_meta_box');

// Заполнять alt при выборе изображения из названия файла
function change_empty_alt_to_title($response)
{
    if (! $response['alt']) {
        $response['alt'] = 'Изображение ' . sanitize_text_field($response['title']);
    }

    return $response;
}

add_filter('wp_prepare_attachment_for_js', 'change_empty_alt_to_title');
