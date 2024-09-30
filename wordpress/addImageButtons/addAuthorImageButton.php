<script>
    // Кнопка добавить изображение
    jQuery(document).ready(function($) {
        $('#upload_author_avatar').click(function(e) {
            e.preventDefault();
            let frame = wp.media({
                title: '<?php _e('Выбрать изображение', 'textdomain'); ?>',
                button: {
                    text: '<?php _e('Использовать изображение', 'textdomain'); ?>'
                },
                multiple: false
            });
            frame.on('select', function() {
                let attachment = frame.state().get('selection').first().toJSON();

                $('#author_avatar').val(attachment.id);
                $('#author_avatar_preview').attr('src', attachment.url);
                $('#author_avatar_alt').attr('alt', attachment.name);
            });
            frame.open();
        });

        // Кнопка удалить изображение
        $('#remove_author_avatar').click(function(e) {
            e.preventDefault();
            $('#author_avatar').val('');
            $('#author_avatar_preview').attr('src', '');
            $('#author_avatar_alt').attr('alt', '');
            $(this).hide();
        });
    });
</script>