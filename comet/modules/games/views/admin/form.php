<?php echo validation_errors(); ?>
<?php echo form_open_multipart(uri_string(), array('class' => 'cms-form')); ?>

	<input placeholder="Game title" type="text" name="name" value="<?php echo isset($data) ? $data['name'] : set_value("name"); ?>" />

	<input placeholder="Shortcode" type="text" name="shortcode" value="<?php echo isset($data) ? $data['shortcode'] : set_value("shortcode"); ?>" />

	<label>Icon</label>
	<?php if(isset($data['icon'])): ?>
		<img src="<?php echo base_url(); ?>/assets/admin/games/<?php echo $data['icon']; ?>" />
	<?php endif; ?>
	<input type="file" name="icon" size="20" />
	
	<br>

	<button type="submit" class="btn btn-large btn-cms-orange">Save post</button>
	<button type="button" class="btn btn-large btn-cms goback">Cancel</button>

<?php echo form_close(); ?>