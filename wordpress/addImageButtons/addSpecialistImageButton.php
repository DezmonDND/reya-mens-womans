<script>
    // Кнопка добавить изображение
    jQuery(document).ready(function($) {
        $('#upload_specialist_avatar').click(function(e) {
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

                $('#specialist_avatar').val(attachment.id);
                $('#specialist_avatar_preview').attr('src', attachment.url);
                $('#specialist_avatar_alt').attr('alt', attachment.name);
            });
            frame.open();
        });

        // Кнопка удалить изображение
        $('#remove_specialist_avatar').click(function(e) {
            e.preventDefault();
            $('#specialist_avatar').val('');
            $('#specialist_avatar_preview').attr('src', '');
            $('#specialist_avatar_alt').attr('alt', '');
            $(this).hide();
        });
    });
</script>