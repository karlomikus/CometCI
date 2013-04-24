<?php echo validation_errors(); ?>
<?php echo form_open_multipart(uri_string(), array('class' => 'cms-form')); ?>

	<input placeholder="Title" type="text" name="title" class="input-xxlarge" value="<?php echo isset($data) ? $data['title'] : set_value("title"); ?>" />

	<select placeholder="Choose label" class="js_select input-xlarge" name="label">
		<option></option>
		<?php foreach($labels as $label): ?>
		<option value="<?php echo $label->id; ?>" <?php echo isset($data) ? set_select('label', $data['id'], $label->id==$data['label'] ? TRUE : FALSE) : set_select('label'); ?>><?php echo $label->name; ?></option>
		<?php endforeach; ?>
	</select>

	<label class="checkbox">
		<input type="checkbox" name="featured" />
		Featured news (Shown in featured news widget)
	</label>
	<label class="checkbox">
		<input type="checkbox" name="clan" />
		Clan news (Only clan members can see this news)
	</label>

	<textarea placeholder="Teaser text" name="teaser" style="width: 40%;" rows="4"><?php echo isset($data) ? $data['teaser'] : set_value("teaser"); ?></textarea>

	<textarea placeholder="Content" class="ckeditor" name="body" style="width: 40%;" rows="5"><?php echo isset($data) ? $data['body'] : set_value("body", "Content"); ?></textarea>

	<label class="radio">
		<input type="radio" name="state" value="1" checked>
		Publish post now
	</label>
	<label class="radio">
		<input type="radio" name="state" value="0">
		Save post as draft
	</label>

	<button type="submit" class="btn btn-large btn-cms-orange">Save post</button>
	<button type="button" class="btn btn-large btn-cms goback">Cancel</button>

<?php echo form_close(); ?>