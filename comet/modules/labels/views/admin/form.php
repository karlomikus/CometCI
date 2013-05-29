<?php echo validation_errors(); ?>
<?php echo form_open_multipart(uri_string(), array('class' => 'cms-form')); ?>

	<input placeholder="Title" type="text" name="title" value="<?php echo isset($data) ? $data['name'] : set_value("title"); ?>" />

	<br />

	<textarea placeholder="Description" name="description" style="width: 40%;" rows="5"><?php echo isset($data) ? $data['description'] : set_value("description"); ?></textarea>

	<div class="cms-upload">
		<?php if(isset($data) && !empty($data['banner'])): ?>
		<img src="<?php echo base_url(); ?>uploads/labels/<?php echo $data['banner']; ?>" alt="" />
		<hr />
		<?php endif; ?>
		<p>Choose label banner</p> <a class="btn btn-cms-orange show-file-input" href="#"><i class="icon-cloud-upload"></i></a>
	</div>

	<button type="submit" class="btn btn-large btn-cms-orange">Save label</button>
	<button type="button" class="btn btn-large btn-cms goback">Cancel</button>
	<input id="file-input" class="hidden" type="file" name="banner" size="1" />

<?php echo form_close(); ?>