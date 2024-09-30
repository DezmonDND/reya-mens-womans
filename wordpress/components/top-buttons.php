<?php
if (isset($categories)) {
?>
	<button
		class="tag-name active"
		data-taxonomy="category"
		data-taxonomy-terms="0"
		data-taxonomy-operator="NOT-IN">
		<?php echo __('Все статьи'); ?>
	</button>
	<?php foreach ($categories as $category) {
		if ($category->cat_ID == 1) {
			continue;
		} ?>
		<button
			class="tag-name"
			data-taxonomy="category"
			data-taxonomy-terms="<?php echo $category->slug; ?>"
			data-taxonomy-operator="IN">
			<?php echo $category->name; ?>
		</button>
	<?php } ?>
<?php }
?>