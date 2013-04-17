<?php echo validation_errors(); ?>
<?php echo form_open_multipart(uri_string(), array('class' => 'cms-form')); ?>

	<input placeholder="Title" type="text" name="title" value="<?php echo isset($data) ? $data['title'] : set_value("title"); ?>" />

	<textarea name="teaser" style="width: 40%;" rows="5"><?php echo isset($data) ? $data['teaser'] : set_value("teaser", "Post teaser text"); ?></textarea>

	<textarea class="ckeditor" name="body" style="width: 40%;" rows="7"><?php echo isset($data) ? $data['body'] : set_value("body", "Post body"); ?></textarea>

	<select placeholder="Choose label" class="js_select input-xlarge" name="label">
		<option></option>
		<?php foreach($labels as $label): ?>
		<option value="<?php echo $label->id; ?>" <?php echo isset($data) ? set_select('label', $data['countryID'], $label->id==$data['label'] ? TRUE : FALSE) : set_select('label'); ?>><?php echo $label->name; ?></option>
		<?php endforeach; ?>
	</select>

	<br />

	<?php //echo form_submit(array('name' => 'save', 'value' => 'Save post', 'class' => 'btn-large btn-cms-orange')); ?>
	<button type="submit" class="btn btn-large btn-cms-orange">Save post</button>

<?php echo form_close(); ?>