<?php echo validation_errors(); ?>
<?php echo form_open_multipart(uri_string(), array('class' => 'cms-form')); ?>

	<input placeholder="Name" type="text" name="title" value="<?php echo isset($data) ? $data->name : set_value("title"); ?>" disabled />

	<br />

	<input placeholder="Link" type="text" name="link" value="<?php echo isset($data) ? $data->link : set_value("link"); ?>/" disabled />

	<br />

	<textarea placeholder="Description" name="description" style="width: 40%;" rows="5"><?php echo isset($data) ? $data->description : set_value("description"); ?></textarea>

	<ul class="check-list">
		<li>
			<input id="check-enable" type="checkbox" name="enabled" value="1" checked>
			<label for="check-enable">Enable module</label>
		</li>
	</ul>

	<select placeholder="Choose layout" name="layout" class="js_select input-xlarge">
		<option></option>
		<?php foreach ($layouts as $layout): ?>
		<option value="<?php echo $layout; ?>"><?php echo $layout; ?></option>
		<?php endforeach; ?>
	</select>

	<br />

	<button type="submit" class="btn btn-large btn-cms-orange">Save module</button>

<?php echo form_close(); ?>

<script>
$(function(){
	$("#popover").popover();
});
</script