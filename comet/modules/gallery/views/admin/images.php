<?php echo validation_errors(); ?>
<?php echo form_open_multipart(uri_string(), array('class' => 'cms-form' )); ?>

	<h4>Upload</h4>

	<input type="file" id="images" name="images[]" multiple />

	<ul class="check-list">
		<li>
			<input id="check-resize" type="checkbox" name="resize" value="1" />
			<label for="check-resize">Resize images</label>
		</li>
	</ul>

	<input placeholder="Width" type="text" name="width" class="input-small" value="1920" />

	X

	<input placeholder="Height" type="text" name="height" class="input-small" value="1080" />

	<br />

	<button type="submit" class="btn btn-cms-orange">Upload</button>

	<div class="alert alert-info alert-block">
		<h4>Note</h4>
		Image processing can require a considerable amount of server memory for some operations. If you are experiencing out of memory errors while processing images you may need to limit number of images and/or resize values.
	</div>
<?php echo form_close(); ?>

<?php echo form_open('admin/gallery/deletemany/'.$id, array('class' => 'cms-form' )); ?>

	<h4>Existing images</h4>

	<ul class="gallery-list">
		<?php foreach($data as $image): ?>
			<li>
				<img src="<?php echo base_url("uploads/".$image->file) ?>" alt="Image" />
				<br />
				<input type="text" value="<?php echo $image->title; ?>" />
				<br />
				<input type="checkbox" name="todelete[]" value="<?php echo $image->id; ?>" />
			</li>
		<?php endforeach; ?>
	</ul>

	<button type="submit" class="btn btn-cms-orange">Delete selected</button>

	<button type="submit" class="btn btn-cms-orange">Update titles</button>
<?php echo form_close(); ?>