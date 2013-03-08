<?php echo validation_errors(); ?>
<?php echo form_open_multipart(uri_string()); ?>

	<label>Post title</label>
	<input type="text" name="title" value="<?php echo isset($data) ? $data['title'] : set_value("title"); ?>" />

	<label>Teaser text</label>
	<textarea name="teaser" style="width: 40%;" rows="5"><?php echo isset($data) ? $data['teaser'] : set_value("teaser"); ?></textarea>

	<label>Post content</label>
	<textarea name="body" style="width: 40%;" rows="7"><?php echo isset($data) ? $data['body'] : set_value("body"); ?></textarea>

	<label>Labels</label>
	<select class="js_select" name="label">
		<?php foreach($labels as $label): ?>
		<option value="<?php echo $label->id; ?>" <?php echo isset($data) ? set_select('label', $data['countryID'], $label->id==$data['label'] ? TRUE : FALSE) : set_select('label'); ?>><?php echo $label->name; ?></option>
		<?php endforeach; ?>
	</select>

	<hr />

	<?php echo form_submit(array('name' => 'save', 'value' => 'Save post', 'class' => 'btn btn-dark')); ?>

<?php echo form_close(); ?>