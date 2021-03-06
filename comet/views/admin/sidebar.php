<aside class="sidebar-group">
	<section class="sidebar-icon">
		<ul>
			<li><a href="#dashboard-tab" data-toggle="tab" title="Dashboard"><img src="<?php echo base_url(); ?>assets/admin/img/sidebar/icon-dashboard.png" alt="Dashboard" /></a></li>
			<li><a href="#content-tab" data-toggle="tab" title="Site content"><img src="<?php echo base_url(); ?>assets/admin/img/sidebar/icon-content.png" alt="Content" /></a></li>
			<li><a href="#clan-tab" data-toggle="tab" title="Clan management"><img src="<?php echo base_url(); ?>assets/admin/img/sidebar/icon-clan.png" alt="Clan" /></a></li>
			<li><a href="#users-tab" data-toggle="tab" title="User management"><img src="<?php echo base_url(); ?>assets/admin/img/sidebar/icon-users.png" alt="Users" /></a></li>
			<li><a href="#settings-tab" data-toggle="tab" title="Site settings"><img src="<?php echo base_url(); ?>assets/admin/img/sidebar/icon-settings.png" alt="Settings" /></a></li>
			<li class="last"></li>
		</ul>
	</section>

	<section class="site-sidebar tab-content">
		<ul id="dashboard-tab" class="tab-pane fade in">
			<li class="sidebar-title">Dashboard</li>
			<li><a href="<?php echo site_url('admin/'); ?>">Startpage</a></li>
			<li><a href="<?php echo site_url('admin/matchstats'); ?>">Match Statistics</a></li>
		</ul>
		<ul id="content-tab" class="tab-pane fade in">
			<li class="sidebar-title">Content</li>
			<li><a href="<?php echo site_url('admin/posts'); ?>">Posts</a></li>
			<li><a href="<?php echo site_url('admin/labels'); ?>">Labels</a></li>
			<li><a href="<?php echo site_url('admin/forums'); ?>">Forum</a></li>
			<li><a href="<?php echo site_url('admin/events'); ?>">Events</a></li>
			<li><a href="<?php echo site_url('admin/pages'); ?>">Pages</a></li>
			<li><a href="<?php echo site_url('admin/gallery'); ?>">Gallery</a></li>
			<li><a href="<?php echo site_url('admin/banners'); ?>">Banners</a></li>
		</ul>
		<ul id="clan-tab" class="tab-pane fade in">
			<li class="sidebar-title">Clan</li>
			<li><a href="<?php echo site_url('admin/matches'); ?>">Matches</a></li>
			<li><a href="<?php echo site_url('admin/teams'); ?>">Teams</a></li>
			<li><a href="<?php echo site_url('admin/roster'); ?>">Roster</a></li>
			<li><a href="<?php echo site_url('admin/calendar'); ?>">Fixtures</a></li>
			<li><a href="<?php echo site_url('admin/opponents'); ?>">Opponents</a></li>
			<li><a href="<?php echo site_url('admin/games'); ?>">Games</a></li>
		</ul>
		<ul id="users-tab" class="tab-pane fade in">
			<li class="sidebar-title">Users</li>
			<li><a href="<?php echo site_url('admin/users'); ?>">Users</a></li>
			<li><a href="<?php echo site_url('admin/groups'); ?>">Groups</a></li>
		</ul>
		<ul id="settings-tab" class="tab-pane fade in">
			<li class="sidebar-title">Settings</li>
			<li><a href="<?php echo site_url('admin/settings'); ?>">Site settings</a></li>
			<li><a href="<?php echo site_url('admin/navigation'); ?>">Site navigation</a></li>
			<li><a href="<?php echo site_url('admin/modules'); ?>">Modules</a></li>
		</ul>
	</section>
</aside>