<?php echo validation_errors(); ?>
<?php echo form_open_multipart(uri_string(), array('class' => 'cms-form')); ?>

	<input placeholder="Name" type="text" name="title" value="<?php echo isset($data) ? $data->name : set_value("title"); ?>" disabled />

	<input placeholder="Link" type="text" name="link" value="<?php echo isset($data) ? $data->link : set_value("link"); ?>/" disabled />

	<textarea placeholder="Description" name="description" style="width: 40%;" rows="5"><?php echo isset($data) ? $data->description : set_value("description"); ?></textarea>

	<ul class="check-list">
		<li>
			<input id="check-enable" type="checkbox" name="enable" value="1" checked>
			<label for="check-enable">Enable module</label>
		</li>
	</ul>

	<select placeholder="Choose layout" name="layout" class="js_select input-xlarge">
		<option></option>
		<?php foreach ($layouts as $layout): ?>
		<option value="<?php echo $layout; ?>"><?php echo $layout; ?></option>
		<?php endforeach; ?>
	</select>

	<a id="popover" href="#" class="btn btn-cms" rel="popover" data-content="Shows all layouts currently available in your chosen frontend theme." data-original-title="Layouts info"><i class="icon-info-sign"></i></a>

	<br />

	<button type="submit" class="btn btn-large btn-cms-orange">Save module</button>

<?php echo form_close(); ?>

<script>
$(function(){
	$("#popover").popover();
});
</script