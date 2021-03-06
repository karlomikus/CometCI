<?php echo validation_errors(); ?>
<?php echo form_open_multipart(uri_string(), array('class' => 'cms-form')); ?>

	<input placeholder="Team name" type="text" name="name" value="<?php echo isset($data) ? $data['name'] : set_value("name"); ?>" />

	<br />

	<textarea placeholder="Description" name="description" style="width: 40%;" rows="5"><?php echo isset($data) ? $data['description'] : set_value("description"); ?></textarea>

	<br />

	<select placeholder="Select game(s)" class="js_select input-xxlarge" name="games[]" multiple>
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
	</select>

	<br />

	<select placeholder="Choose country" class="js_select input-xlarge" name="country">
		<option value=""></option>
		<?php foreach($countries as $country): ?>
		<option value="<?php echo $country->id; ?>" <?php echo isset($data) ? set_select('country', $data['countryID'], $country->id==$data['countryID'] ? TRUE : FALSE) : set_select('country'); ?>><?php echo $country->name; ?></option>
		<?php endforeach; ?>
	</select>

	<div class="cms-upload" id="teamLogo">
		<?php if(isset($data) && !empty($data['logo'])): ?>
		<img src="<?php echo base_url(); ?>uploads/teams/<?php echo $data['logo']; ?>" alt="" />
		<hr />
		<?php endif; ?>
		<p>Choose team logo</p> <a class="btn btn-cms-orange show-file-input" href="#file-logo"><i class="icon-cloud-upload"></i></a>
	</div>

	<div class="cms-upload" id="teamBanner">
		<?php if(isset($data) && !empty($data['banner'])): ?>
		<img src="<?php echo base_url(); ?>uploads/teams/<?php echo $data['banner']; ?>" alt="" />
		<hr />
		<?php endif; ?>
		<p>Choose team banner</p> <a class="btn btn-cms-orange show-file-input" href="#file-banner"><i class="icon-cloud-upload"></i></a>
	</div>	

	<button type="submit" class="btn btn-large btn-cms-orange">Save team</button>
	<a class="btn btn-large btn-cms" href="<?php echo base_url(); ?>admin/<?php echo $this->uri->segment(2); ?>">Cancel</a>

	<input id="file-logo" class="hidden" type="file" name="logo" size="1" />
	<input id="file-banner" class="hidden" type="file" name="banner" size="1" />

<?php echo form_close(); ?>