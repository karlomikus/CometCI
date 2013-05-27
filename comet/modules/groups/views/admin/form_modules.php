<?php echo validation_errors(); ?>
<?php echo form_open(uri_string(), array('class' => 'cms-form')); ?>

	<ul class="check-list">
		<?php foreach($modules as $module): ?>
		<li>
			<input id="check-<?php echo $module->name; ?>" type="checkbox" name="module[]" value="<?php echo $module->id; ?>" />
			<label for="check-<?php echo $module->name; ?>"><?php echo $module->name; ?></label>
		</li>
		<?php endforeach; ?>
	</ul>

    <button type="submit" class="btn btn-large btn-cms-orange">Edit permissions</button>
	<a class="btn btn-large btn-cms" href="<?php echo base_url(); ?>admin/<?php echo $this->uri->segment(2); ?>">Cancel</a>
<?php echo form_close(); ?>