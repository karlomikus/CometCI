<?php foreach ($teams as $team): ?>
	<div class="team-panel">
		<h4><?php echo $team->name; ?></h4>
		<?php if($this->roster_m->get_team_roster($team->id)): ?>
		<ul class="thumbnails">
			<?php foreach ($this->roster_m->get_team_roster($team->id) as $member): ?>
			<li class="span2">
				<div class="thumbnail user-panel text-center">
					<img src="<?php echo base_url(); ?>uploads/users/<?php echo get_avatar($member->user_id); ?>" alt="">
					<p>
						<strong><?php echo $this->ion_auth->user($member->user_id)->row()->username; ?></strong><br />
						<?php echo $member->position; ?>
					</p>
				</div>
			</li>
			<?php endforeach;?>
		</ul>
		<?php else: ?>
		No members in this team!
		<?php endif; ?>
		<a class="btn btn-dark" href="#">ADD TO TEAM</a>
	</div>
<?php endforeach;?>