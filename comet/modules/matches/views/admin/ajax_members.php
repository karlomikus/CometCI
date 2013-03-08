<?php if (isset($data)): ?>
	<label>Your team players</label>
	<select class="js_select teamplayers" name="team_players[]" multiple>
	<?php foreach($data as $members): ?>
		<option value="<?php echo $members['user_id']; ?>"><?php echo $this->ion_auth->user($members['user_id'])->row()->username; ?></option>
	<?php endforeach; ?>
	</select>
<?php endif; ?>