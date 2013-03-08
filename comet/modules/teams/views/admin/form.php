<?php echo validation_errors(); ?>

<?php echo form_open_multipart(uri_string()); ?>

	<label>Team name</label>
	<input type="text" name="name" value="<?php echo isset($data) ? $data['name'] : set_value("name"); ?>" />

	<label class="checkbox inline">
	<input id="type_check" type="checkbox" name="type" value="1" <?php echo isset($data) ? ($data['type']==1 ? 'checked' : '') : 'checked'; ?>>
		Gaming team
	</label>

	<label>Description</label>
	<textarea name="description" style="width: 40%;" rows="5"><?php echo isset($data) ? $data['description'] : set_value("description"); ?></textarea>

	<div class="show_games"><label>Games</label>
	<select class="js_select" name="games[]" data-placeholder="Select game(s)" multiple>
		<option></option>
		<?php foreach($games as $game): ?>
		<?php 
			$gID = $game->id;
			$selected = null;
			if (isset($data)) {
				$picked_games = explode(',', $data['games']);
				if (in_array($gID, $picked_games)) {
					$selected = 'selected';
				}
			}
		 ?>
		<option value="<?php echo $game->id; ?>" <?php echo $selected; ?>><?php echo $game->name; ?></option>
		<?php endforeach; ?>
	</select></div>

	<label>Country</label>
	<select class="js_select" name="country">
		<?php foreach($countries as $country): ?>
		<option value="<?php echo $country->id; ?>" <?php echo isset($data) ? set_select('country', $data['countryID'], $country->id==$data['countryID'] ? TRUE : FALSE) : set_select('country'); ?>><?php echo $country->name; ?></option>
		<?php endforeach; ?>
	</select>

	<label>Team logo</label>
	<input type="file" name="logo" size="20" />

	<label>Team banner</label>
	<input type="file" name="banner" size="20" />

	<hr />

	<?php echo form_submit(array('name' => 'save', 'value' => 'Save team', 'class' => 'btn btn-dark')); ?>

<?php echo form_close(); ?>