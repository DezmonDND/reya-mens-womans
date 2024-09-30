<?php
function register_author_taxonomy()
{
    $labels = array(
        'name'              => _x('Авторы', 'taxonomy general name', 'textdomain'),
        'singular_name'     => _x('Автор', 'taxonomy singular name', 'textdomain'),
        'search_items'      => __('Искать Авторов', 'textdomain'),
        'all_items'         => __('Все Авторы', 'textdomain'),
        'parent_item'       => __('Родительский Автор', 'textdomain'),
        'parent_item_colon' => __('Родительский Автор:', 'textdomain'),
        'edit_item'         => __('Редактировать Автора', 'textdomain'),
        'update_item'       => __('Обновить Автора', 'textdomain'),
        'add_new_item'      => __('Добавить нового Автора', 'textdomain'),
        'new_item_name'     => __('Новое Имя Автора', 'textdomain'),
        'menu_name'         => __('Авторы', 'textdomain'),
    );

    $args = array(
        'hierarchical'      => false,
        'labels'            => $labels,
        'show_ui'           => true,
        'show_in_rest'      => false,
        'show_admin_column' => true,
        'query_var'         => true,
        'rewrite'           => array('slug' => 'author'),
    );

    register_taxonomy('author', array('post'), $args);
}
add_action('init', 'register_author_taxonomy');

// Добавление полей при создании таксономии
function add_author_taxonomy_fields_on_create()
{
?>
    <div class="form-field term-nickname-wrap">
        <label for="name"><?php _e('Имя и Фамилия', 'textdomain'); ?></label>
        <input type="text" name="name" id="name" value="">
        <p><?php _e('Введите имя и фамилию автора', 'textdomain'); ?></p>
    </div>
    <div class="form-field term-nickname-wrap">
        <label for="nickname"><?php _e('Псевдоним', 'textdomain'); ?></label>
        <input type="text" name="nickname" id="nickname" value="">
        <p><?php _e('Введите псевдоним автора', 'textdomain'); ?></p>
    </div>
    <div class="form-field term-specialty-wrap">
        <label for="specialty"><?php _e('Специальность', 'textdomain'); ?></label>
        <input type="text" name="specialty" id="specialty" value="">
        <p><?php _e('Введите специальность автора', 'textdomain'); ?></p>
    </div>
    <div class="form-field term-education-wrap">
        <label for="education"><?php _e('Образование', 'textdomain'); ?></label>
        <input type="text" name="education" id="education" value="">
        <p><?php _e('Введите образование автора', 'textdomain'); ?></p>
    </div>
    <div class="form-field term-quote-wrap">
        <label for="quote"><?php _e('Цитата', 'textdomain'); ?></label>
        <textarea name="quote" id="quote" rows="5"></textarea>
        <p><?php _e('Введите цитату автора', 'textdomain'); ?></p>
    </div>
<?php
}
add_action('author_add_form_fields', 'add_author_taxonomy_fields_on_create');

// Редактирование полей в существующей таксономии
function add_author_taxonomy_fields($term)
{
    $term_id = $term->term_id;

    // Получаем значения метаполей
    $name = get_term_meta($term_id, 'name', true);
    $nickname = get_term_meta($term_id, 'nickname', true);
    $specialty = get_term_meta($term_id, 'specialty', true);
    $education = get_term_meta($term_id, 'education', true);
    $quote = get_term_meta($term_id, 'quote', true);

?>
    <tr class="form-field">
        <th scope="row" valign="top">
            <label for="name"><?php _e('Имя и Фамилия', 'textdomain'); ?></label>
        </th>
        <td>
            <input type="text" name="name" id="name" value="<?php echo esc_attr($name); ?>">
            <p class="description"><?php _e('Введите имя и фамилию автора', 'textdomain'); ?></p>
        </td>
    </tr>
    <tr class="form-field">
        <th scope="row" valign="top">
            <label for="nickname"><?php _e('Псевдоним', 'textdomain'); ?></label>
        </th>
        <td>
            <input type="text" name="nickname" id="nickname" value="<?php echo esc_attr($nickname); ?>">
            <p class="description"><?php _e('Введите псевдоним автора', 'textdomain'); ?></p>
        </td>
    </tr>
    <tr class="form-field">
        <th scope="row" valign="top">
            <label for="specialty"><?php _e('Специальность', 'textdomain'); ?></label>
        </th>
        <td>
            <input type="text" name="specialty" id="specialty" value="<?php echo esc_attr($specialty); ?>">
            <p class="description"><?php _e('Введите специальность автора', 'textdomain'); ?></p>
        </td>
    </tr>
    <tr class="form-field">
        <th scope="row" valign="top">
            <label for="education"><?php _e('Образование', 'textdomain'); ?></label>
        </th>
        <td>
            <input type="text" name="education" id="education" value="<?php echo esc_attr($education); ?>">
            <p class="description"><?php _e('Введите образование автора', 'textdomain'); ?></p>
        </td>
    </tr>

    <tr class="form-field">
        <th scope="row" valign="top">
            <label for="quote"><?php _e('Цитата', 'textdomain'); ?></label>
        </th>
        <td>
            <textarea name="quote" id="quote" rows="5"><?php echo esc_textarea($quote); ?></textarea>
            <p class="description"><?php _e('Введите цитату автора', 'textdomain'); ?></p>
        </td>
    </tr>
<?php
}
add_action('author_edit_form_fields', 'add_author_taxonomy_fields');

// Сохранение данных
function save_author_taxonomy_fields($term_id)
{
    if (isset($_POST['name'])) {
        update_term_meta($term_id, 'name', sanitize_text_field($_POST['name']));
    }
    if (isset($_POST['nickname'])) {
        update_term_meta($term_id, 'nickname', sanitize_text_field($_POST['nickname']));
    }
    if (isset($_POST['specialty'])) {
        update_term_meta($term_id, 'specialty', sanitize_text_field($_POST['specialty']));
    }
    if (isset($_POST['education'])) {
        update_term_meta($term_id, 'education', sanitize_text_field($_POST['education']));
    }
    if (isset($_POST['quote'])) {
        update_term_meta($term_id, 'quote', sanitize_textarea_field($_POST['quote']));
    }
}
add_action('edited_author', 'save_author_taxonomy_fields');
add_action('create_author', 'save_author_taxonomy_fields');

// Показать метаполя в колонках таблицы терминов
function add_author_columns($columns)
{
    $columns['name'] = __('Имя и Фамилия', 'textdomain');
    $columns['nickname'] = __('Псевдоним', 'textdomain');
    $columns['specialty'] = __('Специальность', 'textdomain');
    $columns['education'] = __('Образование', 'textdomain');
    $columns['quote'] = __('Цитата', 'textdomain');
    return $columns;
}
add_filter('manage_edit-author_columns', 'add_author_columns');

add_action("author_edit_form", 'hide_description_row');
add_action("author_add_form", 'hide_description_row');

function show_author_column_content($content, $column_name, $term_id)
{
    if ($column_name === 'name') {
        $name = get_term_meta($term_id, 'nickname', true);
        $content = esc_html($name);
    } else if ($column_name === 'nickname') {
        $nickname = get_term_meta($term_id, 'nickname', true);
        $content = esc_html($nickname);
    } elseif ($column_name === 'specialty') {
        $specialty = get_term_meta($term_id, 'specialty', true);
        $content = esc_html($specialty);
    } elseif ($column_name === 'education') {
        $education = get_term_meta($term_id, 'education', true);
        $content = esc_html($education);
    } elseif ($column_name === 'quote') {
        $quote = get_term_meta($term_id, 'quote', true);
        $content = esc_html($quote);
    }
    return $content;
}

add_filter('manage_author_custom_column', 'show_author_column_content', 10, 3);

function set_author_term_on_acf_save($post_id)
{

    if (defined('DOING_AUTOSAVE') && DOING_AUTOSAVE) {
        return;
    }
    if (wp_is_post_revision($post_id) || get_post_type($post_id) !== 'post') {
        return;
    }
    $is_author_term = get_field('is_author_term', $post_id);

    if ($is_author_term) {
        $author_term = get_field('author_term', $post_id);
        if ($author_term && is_object($author_term)) {
            $author_term_id = $author_term->term_id;
            wp_set_post_terms($post_id, [$author_term_id], 'author');
        }
    } else {
        wp_set_post_terms($post_id, [], 'author');
    }
}

add_action('acf/save_post', 'set_author_term_on_acf_save', 20);
