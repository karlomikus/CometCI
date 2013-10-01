<?php $i=1;foreach ($teams as $team): ?>
	<h4 class="cms-title"><?php echo ellipsize($team->name, 20); ?></h4>
	<div class="media-panel">
		<ul class="media-list">
			<?php $selectedArray = array(); foreach ($this->roster_m->get_team_roster($team->id) as $member): ?>
			<li>
				<div>
					<img src="<?php echo base_url(); ?>uploads/users/<?php echo get_avatar($member->user_id); ?>" alt="_avatar" />
					<br />
					<strong><?php echo ellipsize($this->ion_auth->user($member->user_id)->row()->username, 8); ?></strong>
					<br />
					<?php echo $member->position; ?>
				</div>
			</li>
			<?php $selectedArray[] = $member->user_id; endforeach;?>
			<li><a class="media-add" href="#addUser<?php echo $i; ?>" data-toggle="modal"><i class="icon-plus-sign icon-3x"></i></a></li>
		</ul>
	</div>

<?php echo form_open(uri_string().'/adduser/'.$team->id, array('id'=>'addUser'.$i, 'class'=>'modal hide fade cms-form')); ?>

	<div class="modal-header">
		<h3>Edit members</h3>
	</div>
	<div class="modal-body">
		<p>Editing members for team: <?php echo $team->name; ?></p>
		<select class="js_select input-xxlarge" name="users[]" multiple>
			<?php foreach ($this->ion_auth->users()->result() as $member): ?>
				<?php if(in_array($member->user_id, $selectedArray)) $checked = 'selected'; else $checked = ''; ?>
				<option value="<?php echo $member->user_id; ?>" <?php echo $checked; ?>><?php echo $member->username; ?></option>
			<?php endforeach; ?>
		</select>
	</div>
	<div class="modal-footer">
		<button class="btn btn-cms" data-dismiss="modal" aria-hidden="true">Close</button>
		<button class="btn btn-cms-orange">Save changes</button>
	</div>
<?php echo form_close(); ?>

<?php $i++; endforeach;?>