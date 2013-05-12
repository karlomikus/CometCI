<aside class="sidebar-group">
		<section class="sidebar-icon">
			<ul>
				<li class="active"><a href="#dashboard-tab" data-toggle="tab"><img src="<?php echo base_url(); ?>assets/admin/img/sidebar/icon-dashboard.png" alt="Dashboard" /></a></li>
				<li><a href="#content-tab" data-toggle="tab"><img src="<?php echo base_url(); ?>assets/admin/img/sidebar/icon-content.png" alt="Content" /></a></li>
				<li><a href="#clan-tab" data-toggle="tab"><img src="<?php echo base_url(); ?>assets/admin/img/sidebar/icon-clan.png" alt="Clan" /></a></li>
				<li><a href="#users-tab" data-toggle="tab"><img src="<?php echo base_url(); ?>assets/admin/img/sidebar/icon-users.png" alt="Users" /></a></li>
				<li><a href="#settings-tab" data-toggle="tab"><img src="<?php echo base_url(); ?>assets/admin/img/sidebar/icon-settings.png" alt="Settings" /></a></li>
				<li class="last"></li>
			</ul>
		</section>

		<section class="site-sidebar tab-content">
			<ul id="dashboard-tab" class="tab-pane fade in active">
				<li class="sidebar-title">Dashboard</li>
				<li><a href="<?php echo site_url('admin/'); ?>">Startpage</a></li>
				<li><a href="<?php echo site_url('admin/sitestats'); ?>">Site Statistics</a></li>
				<li><a href="<?php echo site_url('admin/matchstats'); ?>">Clan Statistics</a></li>
			</ul>
			<ul id="content-tab" class="tab-pane fade in">
				<li class="sidebar-title">Content</li>
				<li><a href="<?php echo site_url('admin/posts'); ?>">Posts</a></li>
				<!-- <li><a href="<?php echo site_url('admin/posts'); ?>">Features slider</a></li> -->
				<li><a href="<?php echo site_url('admin/labels'); ?>">Labels</a></li>
				<li><a href="<?php echo site_url('admin/forums'); ?>">Forum</a></li>
				<!-- <li><a href="<?php echo site_url('admin/calendar'); ?>">Events</a></li> -->
				<!-- <li><a href="<?php echo site_url('admin/stats'); ?>">Statistics</a></li>
				<li><a href="<?php echo site_url('admin/gallery'); ?>">Media</a></li>
				<li><a href="<?php echo site_url('admin/advertising'); ?>">Ads</a></li>
				<li><a href="<?php echo site_url('admin/cinema'); ?>">Cinema</a></li> -->
			</ul>
			<ul id="clan-tab" class="tab-pane fade in">
				<li class="sidebar-title">Clan</li>
				<li><a href="<?php echo site_url('admin/matches'); ?>">Matches</a></li>
				<li><a href="<?php echo site_url('admin/teams'); ?>">Teams</a></li>
				<li><a href="<?php echo site_url('admin/roster'); ?>">Roster</a></li>
				<!-- <li><a href="<?php echo site_url('admin/calendar'); ?>">Fixtures</a></li> -->
				<li><a href="<?php echo site_url('admin/opponents'); ?>">Opponents</a></li>
				<li><a href="<?php echo site_url('admin/games'); ?>">Games</a></li>
<!-- 				<li><a href="<?php echo site_url('admin/sponsors'); ?>">Sponsors</a></li>
 -->			</ul>
			<ul id="users-tab" class="tab-pane fade in">
				<li class="sidebar-title">Users</li>
				<li><a href="<?php echo site_url('admin/users'); ?>">Users</a></li>
				<li><a href="<?php echo site_url('admin/groups'); ?>">Groups</a></li>
				<!-- <li><a href="<?php echo site_url('admin/permissions'); ?>">Permissions</a></li> -->
			</ul>
			<ul id="settings-tab" class="tab-pane fade in">
				<li class="sidebar-title">Settings</li>
				<li><a href="#">Site settings</a></li>
				<li><a href="#">Match settings</a></li>
			</ul>
		</section>
	</aside>