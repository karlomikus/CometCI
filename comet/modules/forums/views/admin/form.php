<?php echo validation_errors(); ?>
<?php echo form_open(uri_string(), array('class' => 'cms-form')); ?>

	<input placeholder="Forum name" type="text" name="name" value="<?php echo isset($data) ? $data->name : set_value("name"); ?>" />

	<select placeholder="Choose label" class="js_select input-xlarge" name="label">
		<option></option>
		<?php foreach($labels as $label): ?>
		<option value="<?php echo $label->id; ?>" <?php echo isset($data) ? set_select('label', $data->id, $label->id==$data->label ? TRUE : FALSE) : set_select('label'); ?>><?php echo $label->name; ?></option>
		<?php endforeach; ?>
	</select>

	<textarea placeholder="Description" name="description" style="width: 40%;" rows="5"><?php echo isset($data) ? $data->description : set_value("description"); ?></textarea>

	<select placeholder="Assign moderators" class="js_select input-xlarge" name="mods[]" multiple>
		<option></option>
		<?php foreach($users as $user): ?>
		<option value="<?php echo $user->id; ?>"><?php echo $user->username; ?></option>
		<?php endforeach; ?>
	</select>

	<ul class="check-list">
		<li>
			<input id="check-clan" type="checkbox" name="clan" value="1"<?php echo isset($data) && $data->clan == 1 ? 'checked' : ''; ?> />
			<label for="check-clan">Clanmembers only forum</label>
		</li>
		<li>
			<input id="check-private" type="checkbox" name="private" value="1" <?php echo isset($data) && $data->private == 1 ? 'checked' : ''; ?> />
			<label for="check-private">Visible only to registered users</label>
		</li>
	</ul>

	<button type="submit" class="btn btn-large btn-cms-orange">Save label</button>
	<button type="button" class="btn btn-large btn-cms goback">Cancel</button>

<?php echo form_close(); ?>