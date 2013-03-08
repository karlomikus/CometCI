<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title>Clan Comet v0.01 Alpha - Control Panel</title>
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta name="description" content="Clan Comet CMS site administration">
	<meta name="author" content="Karlo Mikus">
	<link href='http://fonts.googleapis.com/css?family=Open+Sans:400,600,700,800,400italic,300' rel='stylesheet' type='text/css'>
	<link href="<?php echo base_url(); ?>assets/admin/css/bootstrap.css" rel="stylesheet">
	<link href="<?php echo base_url(); ?>assets/admin/css/bootstrap-responsive.min.css" rel="stylesheet">
	<link href="<?php echo base_url(); ?>assets/admin/css/font-awesome.min.css" rel="stylesheet">
	<link href="<?php echo base_url(); ?>assets/admin/css/select2.css" rel="stylesheet">
	<link href="<?php echo base_url(); ?>assets/admin/css/main.css" rel="stylesheet">
	<!--[if lt IE 9]>
	<script src="<?php echo base_url(); ?>/assets/admin/js/html5shiv.js"></script>
	<![endif]-->
</head>
<body>
<div class="navbar navbar-inverse navbar-fixed-top">
	<div class="navbar-inner">
		<div class="container-fluid admin-wrap-header">

			<button type="button" class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse">
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
			</button>

			<h1 class="brand logo">Clan Comet CMS</h1>

			<div class="nav-collapse collapse">
				<ul class="nav pull-right">
					<li class="active"><a href="admin">Main</a></li>
					<li class="dropdown">
						<a href="users/admin" class="dropdown-toggle" data-toggle="dropdown">Clan</a>
						<ul class="dropdown-menu">
						  <li><a href="<?php echo site_url('admin/matches'); ?>">Matches</a></li>
						  <li><a href="<?php echo site_url('admin/teams'); ?>">Teams</a></li>
						  <li><a href="<?php echo site_url('admin/roster'); ?>">Roster</a></li>
						  <li><a href="<?php echo site_url('admin/opponents'); ?>">Opponents</a></li>
						  <li><a href="<?php echo site_url('admin/games'); ?>">Games</a></li>
						  <li><a href="<?php echo site_url('admin/sponsors'); ?>">Sponsors</a></li>
						</ul>
					</li>
					<li class="dropdown">
						<a href="users/admin" class="dropdown-toggle" data-toggle="dropdown">Content</a>
						<ul class="dropdown-menu">
						  <li><a href="<?php echo site_url('admin/posts'); ?>">Posts</a></li>
						  <li><a href="<?php echo site_url('admin/labels'); ?>">Labels</a></li>
						  <li><a href="<?php echo site_url('admin/forum'); ?>">Forum</a></li>
						  <li><a href="<?php echo site_url('admin/calendar'); ?>">Calendar</a></li>
						  <li><a href="<?php echo site_url('admin/stats'); ?>">Statistics</a></li>
						  <li><a href="<?php echo site_url('admin/gallery'); ?>">Gallery</a></li>
						</ul>
					</li>
					<li class="dropdown">
						<a href="#" class="dropdown-toggle" data-toggle="dropdown">Users</a>
						<ul class="dropdown-menu">
						  <li><a href="<?php echo site_url('admin/users'); ?>">Users</a></li>
						  <li><a href="<?php echo site_url('admin/groups'); ?>">Groups</a></li>
						  <li><a href="<?php echo site_url('admin/permissions'); ?>">Permissions</a></li>
						</ul>
					</li>
				</ul>
			</div><!--/.nav-collapse -->

		</div>
	</div>
</div>

<div class="admin-content-wrap">
	<div class="clearfix">
		<div class="col sidebar pull-left">
			<!-- <p>Logged in as <a href="<?php echo site_url('admin/logout'); ?>" class="navbar-link"><?php echo $user; ?></a></p> -->

			<?php echo $template['partials']['sidebar']; ?>
		</div>
		<div class="col template-body pull-right">
			<?php echo $template['partials']['module_header']; ?>
			<?php echo $template['body']; ?>
		</div>
	</div>
</div>

<footer class="site">
	<p>&copy; Clan Comet v0.1a</p>
</footer>

<script src="http://code.jquery.com/jquery-1.9.1.min.js"></script>
<script src="http://code.jquery.com/jquery-migrate-1.1.0.min.js"></script>
<script src="<?php echo base_url(); ?>assets/admin/js/bootstrap.min.js"></script>
<script src="<?php echo base_url(); ?>assets/admin/js/select2.min.js"></script>
<script src="<?php echo base_url(); ?>assets/admin/js/bootstrap.datepicker.js"></script>
<script src="<?php echo base_url(); ?>assets/admin/jquery.filedrop.js"></script>
<script src="<?php echo base_url(); ?>assets/admin/js/main.js"></script>
</body>
</html>
