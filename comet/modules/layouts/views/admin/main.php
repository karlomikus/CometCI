<?php echo validation_errors(); ?>
<?php echo form_open(uri_string(), array('class' => 'cms-form')); ?>

<select name="layout" id="layout-list">
	<option>Choose layout</option>
	<?php foreach ($layouts as $layout): ?>
		<option value="<?php echo $layout; ?>"><?php echo $layout; ?></option>
	<?php endforeach; ?>
</select> <span class="ajax-load"><img src="<?php echo base_url(); ?>assets/admin/img/loading.gif" alt="Loading..." /></span>
<br />
<textarea name="file" id="layout-edit" style="width: 100%; height:400px;"></textarea>

<button type="submit" class="btn btn-cms-orange">SAVE</button>

<?php echo form_close(); ?>