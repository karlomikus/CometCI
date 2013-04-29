<?php echo validation_errors(); ?>
<?php echo form_open_multipart(uri_string(), array('class' => 'cms-form')); ?>

	<input placeholder="Game title" class="input-xlarge" type="text" name="name" value="<?php echo isset($data) ? $data['name'] : set_value("name"); ?>" />

	<input placeholder="Shortcode" class="input-medium" type="text" name="shortcode" value="<?php echo isset($data) ? $data['shortcode'] : set_value("shortcode"); ?>" />

	<div class="cms-upload">
		<?php if(isset($data['icon'])): ?>
			<img src="<?php echo base_url(); ?>/assets/admin/games/<?php echo $data['icon']; ?>" />
			<hr />
		<?php endif; ?>
		<p>Choose game icon</p> <a class="btn btn-cms-orange show-file-input" href="#"><i class="icon-cloud-upload"></i></a>
	</div>

	<button type="submit" class="btn btn-large btn-cms-orange">Save post</button>
	<a class="btn btn-large btn-cms" href="<?php echo base_url(); ?>admin/<?php echo $this->uri->segment(2); ?>">Cancel</a>
	<input class="hidden" id="file-input" type="file" name="icon" size="20" />

<?php echo form_close(); ?>