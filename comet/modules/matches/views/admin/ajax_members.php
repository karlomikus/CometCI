<?php if (isset($data)): ?>
	<?php foreach($data as $members): ?>
		<option value="<?php echo $members['user_id']; ?>"><?php echo $this->ion_auth->user($members['user_id'])->row()->username; ?></option>
	<?php endforeach; ?>
<?php endif; ?>