<?php echo validation_errors(); ?>
<?php echo form_open_multipart(uri_string(), array('class' => 'cms-form')); ?>

	<div class="cms-upload">
		<?php if(isset($data) && !empty($data['image'])): ?>
		<img src="<?php echo base_url(); ?>uploads/slider/<?php echo $data['image']; ?>" alt="" />
		<hr />
		<?php endif; ?>
		<p>Choose slide image</p> <a class="btn btn-cms-orange show-file-input" href="#file-input"><i class="icon-cloud-upload"></i></a>
	</div>

	<input placeholder="Title" type="text" name="title" value="<?php echo isset($data) ? $data['name'] : set_value("title"); ?>" />

	<br />

	<button type="submit" class="btn btn-large btn-cms-orange">Save slide</button>
	<button type="button" class="btn btn-large btn-cms goback">Cancel</button>
	<input id="file-input" class="hidden" type="file" name="image" size="1" />

<?php echo form_close(); ?>