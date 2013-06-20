<?php echo validation_errors(); ?>
<?php echo form_open_multipart(uri_string(), array('class' => 'cms-form')); ?>

	<input placeholder="Name" type="text" name="name" value="<?php echo isset($data) ? $data['name'] : set_value("name"); ?>" />

	<br />

	<input placeholder="Width" class="input-small" type="text" name="width" value="<?php echo isset($data) ? $data['width'] : set_value("width"); ?>" />

	<input placeholder="Height" class="input-small" type="text" name="height" value="<?php echo isset($data) ? $data['height'] : set_value("height"); ?>" />

	<br />

	<input placeholder="Banner URL" type="text" name="url" value="<?php echo isset($data) ? urldecode($data['url']) : set_value("url"); ?>" />

	<br />

	<div class="cms-upload">
		<?php if(isset($data) && !empty($data['image'])): ?>
		<img src="<?php echo base_url(); ?>uploads/banners/<?php echo $data['image']; ?>" alt="" />
		<hr />
		<?php endif; ?>
		<p>Choose banner image</p> <a class="btn btn-cms-orange show-file-input" href="#file-input"><i class="icon-cloud-upload"></i></a>
	</div>

	<textarea placeholder="(Optional) Embed code" name="code" style="width: 40%;" rows="5"><?php echo isset($data) ? $data['code'] : set_value("code"); ?></textarea>

	<br />

	<textarea placeholder="Description" name="description" style="width: 40%;" rows="5"><?php echo isset($data) ? $data['description'] : set_value("description"); ?></textarea>

	<br />

	<button type="submit" class="btn btn-large btn-cms-orange">Save label</button>
	<button type="button" class="btn btn-large btn-cms goback">Cancel</button>
	<input id="file-input" class="hidden" type="file" name="image" size="1" />

<?php echo form_close(); ?>