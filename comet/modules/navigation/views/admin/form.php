<?php echo validation_errors(); ?>
<?php echo form_open_multipart(uri_string(), array('class' => 'cms-form')); ?>

	<input placeholder="Name" type="text" name="name" value="<?php echo isset($data) ? $data['name'] : set_value("name"); ?>" />

	<br />

	<select placeholder="Select module or page" name="uri" class="js_select input-xlarge">
		<optgroup label="Modules">
			<?php foreach ($modules as $module): ?>
			<option value="<?php echo $module->link; ?>"><?php echo $module->name; ?></option>
			<?php endforeach; ?>
		</optgroup>
		<optgroup label="Pages">
			<?php foreach ($pages as $page): ?>
			<option value="<?php echo $page->id; ?>"><?php echo $page->navigation; ?></option>
			<?php endforeach; ?>
		</optgroup>
	</select> or

	<br />

	<input placeholder="URL" type="text" name="url" value="<?php echo isset($data) ? $data['link'] : set_value("link"); ?>" />

	<br />

	<input placeholder="Sort" class="input-small" type="text" name="sort" value="<?php echo isset($data) ? $data['sort'] : set_value("sort"); ?>" />

	<br />

	<button type="submit" class="btn btn-large btn-cms-orange">Save link</button>
	<button type="button" class="btn btn-large btn-cms goback">Cancel</button>
	<input id="file-input" class="hidden" type="file" name="banner" size="1" />

<?php echo form_close(); ?>