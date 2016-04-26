<div>
		<?php if(isset($_SESSION['is_logged_in'])): ?>
			<a href="<?php echo ROOT_PATH; ?>shares/add" class="btn btn-success btn-share">
		Share someting
	</a>
<?php endif; ?>
	

	<?php foreach($viewModel as $item) : ?>
		<div class="well">
			<h3>
				<?php echo $item['title']; ?> 
			</h3>
			<small>
				<?php echo $item['create_date']; ?> 
			</small>
			<br>
			<a href="<?php echo $item['link']; ?>" class="btn btn-default" target="_blank">Go to page</a>
		</div>

	<?php endforeach; ?>
</div>