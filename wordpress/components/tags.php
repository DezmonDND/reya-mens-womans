<!-- Блок с тэгами -->
<div class="tags-overlay" id="tags-overlay">
    <? $c = 0;
    $counter = 0;
    $mob_counter = 0;
    $isSeven = true;
    foreach ($tags as $tag): $c++;
        $counter++;
        $mob_counter++;
        if ($c == 5) {
            $c = 1;
        } ?>
        <a
            class="tags-item <?= $tag->meta_value == $tag_name ? 'active' : '' ?>"
            data-type="<?= $c ?>"
            href="/tags/?tag=<?= strtolower(transliterate($tag->meta_value)) ?>">
            <div class="tags-text-wrapper">
                <div class="tags-text"><?= $tag->meta_value ?></div>
            </div>
            <svg class="tags-icon"></svg>
        </a>
        <? if ($isSeven && $counter == 7): $counter = 0;
            $isSeven = false; ?>
            <hr>
        <? elseif (!$isSeven && $counter == 6): $counter = 0;
            $isSeven = true; ?>
            <hr><? endif; ?>

        <? if ($mob_counter == intval(count($tags) / 2)): ?>
            <hr class="mobile-hr"><? endif; ?>
    <? endforeach; ?>
</div>
<div class="tags-overlay-bottom">
    <a href="#" class="tags-show-btn">Все теги</a>
</div>