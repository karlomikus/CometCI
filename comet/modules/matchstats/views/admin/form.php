<?php echo validation_errors(); ?>
<?php echo form_open_multipart(uri_string()); ?>

	<label>Title</label>
	<input type="text" name="title" value="<?php echo isset($data) ? $data['title'] : set_value("title"); ?>" />

	<label>Description</label>
	<textarea name="description" style="width: 40%;" rows="5"><?php echo isset($data) ? $data['description'] : set_value("description"); ?></textarea>

	<label>Banner</label>
	<input type="file" name="banner" size="1" />

	<hr />

	<?php echo form_submit(array('name' => 'save', 'value' => 'Save label', 'class' => 'btn btn-dark')); ?>
<?php echo form_close(); ?>