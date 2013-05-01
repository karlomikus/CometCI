<?php $i=1;foreach ($teams as $team): ?>
	<h4 class="cms-title"><?php echo $team->name; ?></h4>
	<div class="media-panel">
		<ul class="media-list">
			<?php $selectedArray = array(); foreach ($this->roster_m->get_team_roster($team->id) as $member): ?>
			<li>
				<div>
					<img src="<?php echo base_url(); ?>uploads/users/<?php echo get_avatar($member->user_id); ?>" alt="">
					<br />
					<strong><?php echo $this->ion_auth->user($member->user_id)->row()->username; ?></strong>
					<br />
					<?php echo $member->position; ?>
				</div>
			</li>
			<?php $selectedArray[] = $member->user_id; endforeach;?>
			<li><a class="media-add" href="#addUser<?php echo $i; ?>" data-toggle="modal"><i class="icon-plus-sign icon-3x"></i></a></li>
		</ul>
	</div>

<form action="roster/adduser/<?php echo $team->id; ?>" method="post" accept-charset="utf-8" id="addUser<?php echo $i; ?>" class="modal hide fade cms-form" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
	<div class="modal-header">
		<h3>Add user to roster</h3>
	</div>
	<div class="modal-body">
		<p>Choose users you want to add to <strong><?php echo $team->name; ?></strong></p>
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
</form>

<?php $i++; endforeach;?>