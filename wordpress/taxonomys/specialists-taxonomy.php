<?php

function register_specialists_taxonomy()
{
    $labels = array(
        'name'              => _x('Специалисты', 'taxonomy general name', 'textdomain'),
        'singular_name'     => _x('Специалист', 'taxonomy singular name', 'textdomain'),
        'search_items'      => __('Искать специалистов', 'textdomain'),
        'all_items'         => __('Все специалисты', 'textdomain'),
        'parent_item'       => __('Родительский специалист', 'textdomain'),
        'parent_item_colon' => __('Родительский специалист:', 'textdomain'),
        'edit_item'         => __('Редактировать специалиста', 'textdomain'),
        'update_item'       => __('Обновить данные специалиста', 'textdomain'),
        'add_new_item'      => __('Сохранить', 'textdomain'),
        'new_item_name'     => __('Новое имя специалиста', 'textdomain'),
        'menu_name'         => __('Специалисты', 'textdomain'),
    );

    $args = array(
        'hierarchical'      => false,
        'labels'            => $labels,
        'show_ui'           => true,
        'show_in_rest'      => false,
        'show_admin_column' => true,
        'query_var'         => true,
        'rewrite'           => array('slug' => 'specialists'),
    );

    register_taxonomy('specialists', array('post'), $args);
}
add_action('init', 'register_specialists_taxonomy');

function hide_description_row()
{
    echo "<style> .term-description-wrap, .term-slug-wrap, tfoot { display: none; } </style>";
}

add_action("specialists_edit_form", 'hide_description_row');
add_action("specialists_add_form", 'hide_description_row');

// Добавление полей при создании таксономии
function add_specialists_taxonomy_fields_on_create()
{
?>
    <div class="form-field term-specialist_firstname-wrap">
        <label for="'specialist_firstname"><?php echo esc_html__('Имя', 'textdomain'); ?></label>
        <input type="text" name="specialist_firstname" id="specialist_firstname" value="">
        <p><?php echo esc_html__('Введите имя специалиста', 'textdomain'); ?></p>
    </div>

    <div class="form-field term-specialist_secondname-wrap">
        <label for="specialist_secondname"><?php echo esc_html__('Фамилия', 'textdomain'); ?></label>
        <input type="text" name="specialist_secondname" id="specialist_secondname" value="">
        <p><?php echo esc_html__('Введите фамилию специалиста', 'textdomain'); ?></p>
    </div>

    <div class="form-field term-specialist_job-wrap">
        <label for="specialist_job"><?php echo esc_html__('Специализация', 'textdomain'); ?></label>
        <input type="text" name="specialist_job" id="specialist_job" value="">
        <p><?php echo esc_html__('Введите специализацию специалиста', 'textdomain'); ?></p>
    </div>
<?php
}
add_action('specialists_add_form_fields', 'add_specialists_taxonomy_fields_on_create');

// Редактирование полей
function add_specialists_taxonomy_fields($term)
{
    $term_id = $term->term_id;
    $firstName = get_term_meta($term_id, 'specialist_firstname', true);
    $secondName = get_term_meta($term_id, 'specialist_secondname', true);
    $job = get_term_meta($term_id, 'specialist_job', true);
?>
    <tr class="form-field">
        <th scope="row" valign="top">
            <label for="specialist_firstname"><?php _e('Имя', 'textdomain'); ?></label>
        </th>
        <td>
            <input type="text" name="specialist_firstname" id="specialist_firstname" value="<?php echo esc_attr($firstName); ?>">
            <p class="description"><?php _e('Введите имя для этого специалиста', 'textdomain'); ?></p>
        </td>
    </tr>
    <tr class="form-field">
        <th scope="row" valign="top">
            <label for="specialist_secondname"><?php _e('Фамилия', 'textdomain'); ?></label>
        </th>
        <td>
            <input type="text" name="specialist_secondname" id="specialist_secondname" value="<?php echo esc_attr($secondName); ?>">
            <p class="description"><?php _e('Введите фамилию этого специалиста', 'textdomain'); ?></p>
        </td>
    </tr>
    <tr class="form-field">
        <th scope="row" valign="top">
            <label for="specialist_job"><?php _e('Специализация', 'textdomain'); ?></label>
        </th>
        <td>
            <input type="text" name="specialist_job" id="specialist_job" value="<?php echo esc_attr($job); ?>">
            <p class="description"><?php _e('Введите специализацию этого специалиста', 'textdomain'); ?></p>
        </td>
    </tr>
<?php
}
add_action('specialists_edit_form_fields', 'add_specialists_taxonomy_fields');

// Сохранение данных
function save_specialists_taxonomy_fields($term_id)
{
    if (isset($_POST['specialist_firstname'])) {
        update_term_meta($term_id, 'specialist_firstname', sanitize_text_field($_POST['specialist_firstname']));
    }
    if (isset($_POST['specialist_secondname'])) {
        update_term_meta($term_id, 'specialist_secondname', sanitize_text_field($_POST['specialist_secondname']));
    }
    if (isset($_POST['specialist_job'])) {
        update_term_meta($term_id, 'specialist_job', sanitize_text_field($_POST['specialist_job']));
    }
}

add_action('edited_specialists', 'save_specialists_taxonomy_fields');
add_action('create_specialists', 'save_specialists_taxonomy_fields');

function add_specialists_columns($columns)
{
    $columns['specialist_firstname'] = __('Имя', 'textdomain');
    $columns['specialist_secondname'] = __('Фамилия', 'textdomain');
    $columns['specialist_job'] = __('Специализация', 'textdomain');
    return $columns;
}
add_filter('manage_edit-specialists_columns', 'add_specialists_columns');

function show_specialists_column_content($content, $column_name, $term_id)
{
    if ($column_name === 'specialist_firstname') {
        $firstName = get_term_meta($term_id, 'specialist_firstname', true);
        $content = esc_html($firstName);
    } elseif ($column_name === 'specialist_secondname') {
        $secondName = get_term_meta($term_id, 'specialist_secondname', true);
        $content = esc_html($secondName);
    } elseif ($column_name === 'specialist_job') {
        $job = get_term_meta($term_id, 'specialist_job', true);
        $content = esc_html($job);
    }
    return $content;
}

add_filter('manage_specialists_custom_column', 'show_specialists_column_content', 10, 3);
