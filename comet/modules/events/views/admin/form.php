<?php echo validation_errors(); ?>
<?php echo form_open_multipart(uri_string(), array('class' => 'cms-form')); ?>

	<input placeholder="Name" class="input-xlarge" type="text" name="name" value="<?php echo isset($data) ? $data['name'] : set_value("name"); ?>" />

	<input placeholder="Start date" type="text" name="startdate" value="<?php echo date('Y-m-d H:i:m'); ?>" />

	<input placeholder="End date" type="text" name="enddate" value="<?php echo date('Y-m-d H:i:m'); ?>" />

	<textarea placeholder="Description" name="description" style="width: 40%;" rows="5"><?php echo isset($data) ? $data['description'] : set_value("description"); ?></textarea>

	<input placeholder="Event link" class="input-xlarge" type="text" name="link" value="<?php echo isset($data) ? $data['link'] : set_value("link"); ?>" />

	<div class="cms-upload">
		<?php if(isset($data) && !empty($data['image'])): ?>
		<img src="<?php echo base_url(); ?>uploads/events/<?php echo $data['image']; ?>" alt="" />
		<hr />
		<?php endif; ?>
		<p>Choose event image</p> <a class="btn btn-cms-orange show-file-input" href="#"><i class="icon-cloud-upload"></i></a>
	</div>

	<button type="submit" class="btn btn-large btn-cms-orange">Save label</button>
	<button type="button" class="btn btn-large btn-cms goback">Cancel</button>
	<input id="file-input" class="hidden" type="image" name="banner" size="1" />

<?php echo form_close(); ?>