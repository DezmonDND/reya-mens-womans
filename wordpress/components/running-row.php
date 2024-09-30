<div class="ticker-upper-wrap">
    <div class="ticker-wrap noselect">
        <?php
                $rows = ( is_front_page() )?  get_field('ticker_variants')  : get_field('ticker_variants', 110);
				if( $rows ):
				$random_field = $rows[array_rand($rows, 1)];
				$random_phrase = $random_field['ticker_phrase'];
				$phrase_array = array_fill(0, 10, $random_phrase);?>
				<div class="ticker">
				<?php foreach ($phrase_array as $phrase) {?> 
					<span class="ticker_item"> <?php 
					echo $phrase;
					?> </span><span class="ticker_item">/</span> <?php
				} ?>
				</div>
				<?php // Block for continuous animation ?>
				<div class="ticker">
				<?php foreach ($phrase_array as $phrase) 
				{?> 
					<span class="ticker_item"> <?php 
					echo $phrase;
					?> </span><span class="ticker_item">/</span> 
                    <?php
				} ?>
				</div>
			<?php endif; ?>
		</div>
	</div>