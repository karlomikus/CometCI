<?php echo validation_errors(); ?>
<?php echo form_open_multipart(uri_string(), array('class' => 'cms-form')); ?>

	<input placeholder="Title" type="text" name="title" class="input-xxlarge" value="<?php echo isset($data) ? $data['title'] : set_value("title"); ?>" />

	<br />

	<select placeholder="Choose label" class="js_select input-xlarge" name="label">
		<option></option>
		<?php foreach($labels as $label): ?>
		<option value="<?php echo $label->id; ?>" <?php echo isset($data) ? set_select('label', $data['id'], $label->id==$data['label'] ? TRUE : FALSE) : set_select('label'); ?>><?php echo $label->name; ?></option>
		<?php endforeach; ?>
	</select>

	<ul class="check-list">
		<li>
			<input id="check-clan" type="checkbox" name="clan" value="1" <?php echo @$data['clan'] == 1 ? 'checked' : ''; ?>/>
			<label for="check-clan">Clan news (Only clan members can see this news)</label>
		</li>
		<li>
			<input id="check-featured" type="checkbox" name="featured" value="1" <?php echo @$data['featured'] == 1 ? 'checked' : ''; ?>/>
			<label for="check-featured">Featured news (Shown in featured news widget)</label>
		</li>
	</ul>

	<div class="cms-upload">
		<?php if(isset($data) && !empty($data['image'])): ?>
		<img src="<?php echo base_url(); ?>uploads/posts/<?php echo $data['image']; ?>" alt="" />
		<hr />
		<?php endif; ?>
		<p>Choose post image</p> <a class="btn btn-cms-orange show-file-input" href="#file-input"><i class="icon-cloud-upload"></i></a>
	</div>

	<textarea placeholder="Teaser text" name="teaser" style="width: 40%;" rows="4"><?php echo isset($data) ? $data['teaser'] : set_value("teaser"); ?></textarea>

	<textarea placeholder="Content" class="ckeditor" name="body" style="width: 40%;" rows="5"><?php echo isset($data) ? $data['body'] : set_value("body", "Content"); ?></textarea>

	<ul class="check-list">
		<li>
			<input id="check-publish" type="radio" name="state" value="1" <?php echo @$data['state'] == 1 ? 'checked' : ''; ?>>
			<label for="check-publish">Publish post now</label>
		</li>
		<li>
			<input id="check-draft" type="radio" name="state" value="0" <?php echo @$data['state'] == 0 ? 'checked' : ''; ?>>
			<label for="check-draft">Save post as draft</label>
		</li>
	</ul>

	<button type="submit" class="btn btn-large btn-cms-orange">Save post</button>
	<button type="button" class="btn btn-large btn-cms goback">Cancel</button>
	<input type="file" class="hidden" id="file-input" name="userfile" />

<?php echo form_close(); ?>