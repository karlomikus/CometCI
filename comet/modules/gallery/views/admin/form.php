<?php echo validation_errors(); ?>
<?php echo form_open(uri_string(), array('class' => 'cms-form')); ?>

	<input placeholder="Name" type="text" name="name" value="<?php echo isset($data) ? $data['name'] : set_value("name"); ?>" />

	<br />

	<textarea placeholder="Description" name="description" style="width: 40%;" rows="5"><?php echo isset($data) ? $data['description'] : set_value("description"); ?></textarea>

	<br />

	<select placeholder="Choose viewing access" name="access" class="js_select_no_search input-xlarge">
		<option></option>
		<option value="public">Public</option>
		<option value="clan">Only clan mmembers</option>
		<option value="private">Only registered users</option>
	</select>

	<br />

	<button type="submit" class="btn btn-large btn-cms-orange">Save label</button>
	<button type="button" class="btn btn-large btn-cms goback">Cancel</button>

<?php echo form_close(); ?>