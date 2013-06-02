<?php echo validation_errors(); ?>
<?php echo form_open_multipart(uri_string(), array('class' => 'cms-form')); ?>

	<input placeholder="Name" class="input-xxlarge" type="text" name="name" id="page-name" value="<?php echo isset($data) ? $data['name'] : set_value("name"); ?>" />
	<br />

	<input placeholder="Page slug" class="input-large inputip" type="text" id="page-slug" name="slug" title="Slug the part of an URL which identifies a page using human-readable keywords" value="<?php echo isset($data) ? $data['slug'] : set_value("slug"); ?>" />

	<input placeholder="Navigation name" class="input-large" type="text" name="navigation" value="<?php echo isset($data) ? $data['navigation'] : set_value("navigation"); ?>" />
	<br />

	<textarea placeholder="Description" name="description" style="width: 40%;" rows="3"><?php echo isset($data) ? $data['description'] : set_value("description"); ?></textarea>
	<br />

	<textarea class="ckeditor" name="content">
		<?php echo isset($data) ? $data['content'] : set_value("content"); ?>
	</textarea>

	<select placeholder="Choose page layout" name="layout" class="js_select_no_search input-large">
		<option></option>
		<?php foreach ($layouts as $layout): ?>
			<option value="<?php echo $layout; ?>" <?php echo set_select('layout', $layout, @$data['layout'] == $layout ? TRUE : FALSE); ?>><?php echo $layout; ?></option>
		<?php endforeach; ?>
	</select>

	<select placeholder="Choose access type" class="js_select_no_search input-large" name="access">
		<option></option>
		<option value="public" <?php echo set_select('access', 'public', @$data['access'] == 'public' ? TRUE : FALSE); ?>>Public access</option>
		<option value="registered" <?php echo set_select('access', 'registered', @$data['access'] == 'registered' ? TRUE : FALSE); ?>>Only registered users</option>
		<option value="clan" <?php echo set_select('access', 'clan', @$data['access'] == 'clan' ? TRUE : FALSE); ?>>Only clan members</option>
	</select>

	<br />

	<button type="submit" class="btn btn-large btn-cms-orange">Save label</button>
	<button type="button" class="btn btn-large btn-cms goback">Cancel</button>

<?php echo form_close(); ?>