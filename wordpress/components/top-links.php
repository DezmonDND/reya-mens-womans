<div class="header__links">
    <?php
    $current_page = get_post_type();
    ?>
    <a
        class="header__link <?php echo ($current_page === 'page' && get_the_ID() === get_page_by_path('glavnaya')->ID) ? 'header__link_active' : ''; ?>"
        onclick="window.location.href='<?php echo get_permalink(get_page_by_path('glavnaya')); ?>'"
        title="<?php echo esc_attr__('Сайт о мужском и женском здоровье, родительстве, беременности и родах. Вместе с врачами и экспертами отвечаем на вопросы об ЭКО, зачатии и бесплодии', 'textdomain'); ?>">
        <?php echo __('Главная'); ?>
    </a>
    <a
        class="header__link <?php echo ($current_page === 'page' && get_the_ID() === get_page_by_path('specialists')->ID) ? 'header__link_active' : ''; ?>"
        onclick="window.location.href='<?php echo get_permalink(get_page_by_path('specialists')); ?>'"
        title="<?php echo esc_attr__('Узнать больше о Специалистах', 'textdomain'); ?>">
        <?php echo __('Специалисты'); ?>
    </a>
    <a
        class="header__link <?php echo ($current_page === 'page' && get_the_ID() === get_page_by_path('authors')->ID) ? 'header__link_active' : ''; ?>"
        onclick="window.location.href='<?php echo get_permalink(get_page_by_path('authors')); ?>'"
        title="<?php echo esc_attr__('Наши Авторы', 'textdomain'); ?>">
        <?php echo __('Авторы'); ?>
    </a>
</div>