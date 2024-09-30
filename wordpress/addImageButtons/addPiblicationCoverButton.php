<script>
    // Кнопка добавить изображение
    jQuery(document).ready(function($) {
        $('#upload_publication_cover').click(function(e) {
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

                $('#publication_cover').val(attachment.id);
                $('#publication_cover_preview').attr('src', attachment.url);
                $('#publication_cover_alt').attr('alt', attachment.name);
            });
            frame.open();
        });

        // Кнопка удалить изображение
        $('#remove_publication_cover').click(function(e) {
            e.preventDefault();
            $('#publication_cover').val('');
            $('#publication_cover_preview').attr('src', '');
            $('#publication_cover_alt').attr('alt', '');
            $(this).hide();
        });
    });
</script>