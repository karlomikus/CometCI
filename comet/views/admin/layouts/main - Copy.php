<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title>Clan Comet v0.01 Alpha - Control Panel</title>
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta name="description" content="Clan Comet CMS site administration">
	<meta name="author" content="Karlo Mikus">
	<link href='http://fonts.googleapis.com/css?family=Merriweather+Sans:400,300,700,800|Sintony:400,700' rel='stylesheet' type='text/css'>
	<link href="<?php echo base_url(); ?>assets/admin/css/bootstrap.min.css" rel="stylesheet">
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

------------------------------------------------

<header class="site-header">
		<a class="avatar" href="#"><img src="img/avatar.png" alt="avatar" /></a>

		<h1>Clan Comet</h1>

		<ul>
			<li><a href="#"><img src="img/sidebar/icon-pm.png" alt="Messagess" /></a></li>
			<li><a href="#"><img src="img/sidebar/icon-view.png" alt="View site" /></a></li>
		</ul>
	</header>

	<aside class="sidebar-group">
		<section class="sidebar-icon">
			<ul>
				<li class="active"><a href="#dashboard-tab" data-toggle="tab"><img src="img/sidebar/icon-dashboard.png" alt="Dashboard" /></a></li>
				<li><a href="#content-tab" data-toggle="tab"><img src="img/sidebar/icon-content.png" alt="Content" /></a></li>
				<li><a href="#clan-tab" data-toggle="tab"><img src="img/sidebar/icon-clan.png" alt="Clan" /></a></li>
				<li><a href="#users-tab" data-toggle="tab"><img src="img/sidebar/icon-users.png" alt="Users" /></a></li>
				<li><a href="#settings-tab" data-toggle="tab"><img src="img/sidebar/icon-settings.png" alt="Settings" /></a></li>
			</ul>
		</section>

		<section class="site-sidebar tab-content">
			<ul id="dashboard-tab" class="tab-pane fade in active">
				<li class="sidebar-title">Dashboard</li>
				<li><a href="form.html">Form page</a></li>
				<li><a href="match.html">Match page</a></li>
				<li><a href="#">Site News</a></li>
				<li><a href="#">Comments</a></li>
			</ul>
			<ul id="content-tab" class="tab-pane fade in">
				<li class="sidebar-title">Content</li>
				<li><a href="form.html">Form page</a></li>
				<li><a href="match.html">Match page</a></li>
				<li><a href="#">Site News</a></li>
				<li><a href="#">Comments</a></li>
			</ul>
			<ul id="clan-tab" class="tab-pane fade in">
				<li class="sidebar-title">Clan</li>
				<li><a href="form.html">Form page</a></li>
				<li><a href="match.html">Match page</a></li>
				<li><a href="#">Site News</a></li>
				<li><a href="#">Comments</a></li>
			</ul>
			<ul id="users-tab" class="tab-pane fade in">
				<li class="sidebar-title">uu</li>
				<li><a href="form.html">Form page</a></li>
				<li><a href="match.html">Match page</a></li>
				<li><a href="#">Site News</a></li>
				<li><a href="#">Comments</a></li>
			</ul>
			<ul id="settings-tab" class="tab-pane fade in">
				<li class="sidebar-title">ss</li>
				<li><a href="form.html">Form page</a></li>
				<li><a href="match.html">Match page</a></li>
				<li><a href="#">Site News</a></li>
				<li><a href="#">Comments</a></li>
			</ul>
		</section>
	</aside>

	<section class="site-content">
		
		<form class="cms-form">
			<input class="input-xxlarge" type="text" placeholder="Page title" />

			<input type="text" placeholder="Page slug" />

			<select class="js_select input-xlarge" data-placeholder="Choose">
				<option></option>
				<option>Lorem ipsum</option>
				<option>Lorem ipsum dolor sit amet</option>
				<option>Quick brow fox</option>
				<option>Jumps over</option>
				<option>Lazy dog</option>
			</select>

			<select class="js_select input-xxlarge" data-placeholder="Choose" multiple>
				<option></option>
				<option>Lorem ipsum</option>
				<option selected>Lorem ipsum dolor sit amet</option>
				<option>Quick brow fox</option>
				<option>Jumps over</option>
				<option>Lazy dog</option>
			</select>

			<input class="input-xlarge" type="text" placeholder="Page slug" />

			<textarea class="input-xxlarge" rows="10">Type something</textarea>

			<textarea class="wysiwyg ckeditor" name="editor1" rows="8">&lt;h1&gt;&lt;img alt=&quot;Saturn V carrying Apollo 11&quot; class=&quot;right&quot; src=&quot;img/sample.jpg&quot;/&gt; Apollo 11&lt;/h1&gt; &lt;p&gt;&lt;b&gt;Apollo 11&lt;/b&gt; was the spaceflight that landed the first humans, Americans &lt;a href=&quot;http://en.wikipedia.org/wiki/Neil_Armstrong&quot; title=&quot;Neil Armstrong&quot;&gt;Neil Armstrong&lt;/a&gt; and &lt;a href=&quot;http://en.wikipedia.org/wiki/Buzz_Aldrin&quot; title=&quot;Buzz Aldrin&quot;&gt;Buzz Aldrin&lt;/a&gt;, on the Moon on July 20, 1969, at 20:18 UTC. Armstrong became the first to step onto the lunar surface 6 hours later on July 21 at 02:56 UTC.&lt;/p&gt; &lt;p&gt;Armstrong spent about &lt;s&gt;three and a half&lt;/s&gt; two and a half hours outside the spacecraft, Aldrin slightly less; and together they collected 47.5 pounds (21.5&amp;nbsp;kg) of lunar material for return to Earth. A third member of the mission, &lt;a href=&quot;http://en.wikipedia.org/wiki/Michael_Collins_(astronaut)&quot; title=&quot;Michael Collins (astronaut)&quot;&gt;Michael Collins&lt;/a&gt;, piloted the &lt;a href=&quot;http://en.wikipedia.org/wiki/Apollo_Command/Service_Module&quot; title=&quot;Apollo Command/Service Module&quot;&gt;command&lt;/a&gt; spacecraft alone in lunar orbit until Armstrong and Aldrin returned to it for the trip back to Earth.&lt;/p&gt; &lt;h2&gt;Broadcasting and &lt;em&gt;quotes&lt;/em&gt; &lt;a id=&quot;quotes&quot; name=&quot;quotes&quot;&gt;&lt;/a&gt;&lt;/h2&gt; &lt;p&gt;Broadcast on live TV to a world-wide audience, Armstrong stepped onto the lunar surface and described the event as:&lt;/p&gt; &lt;blockquote&gt;&lt;p&gt;One small step for [a] man, one giant leap for mankind.&lt;/p&gt;&lt;/blockquote&gt; &lt;p&gt;Apollo 11 effectively ended the &lt;a href=&quot;http://en.wikipedia.org/wiki/Space_Race&quot; title=&quot;Space Race&quot;&gt;Space Race&lt;/a&gt; and fulfilled a national goal proposed in 1961 by the late U.S. President &lt;a href=&quot;http://en.wikipedia.org/wiki/John_F._Kennedy&quot; title=&quot;John F. Kennedy&quot;&gt;John F. Kennedy&lt;/a&gt; in a speech before the United States Congress:&lt;/p&gt; &lt;blockquote&gt;&lt;p&gt;[...] before this decade is out, of landing a man on the Moon and returning him safely to the Earth.&lt;/p&gt;&lt;/blockquote&gt; &lt;h2&gt;Technical details &lt;a id=&quot;tech-details&quot; name=&quot;tech-details&quot;&gt;&lt;/a&gt;&lt;/h2&gt; &lt;table align=&quot;right&quot; border=&quot;1&quot; bordercolor=&quot;#ccc&quot; cellpadding=&quot;5&quot; cellspacing=&quot;0&quot; style=&quot;border-collapse:collapse;margin:10px 0 10px 15px;&quot;&gt; &lt;caption&gt;&lt;strong&gt;Mission crew&lt;/strong&gt;&lt;/caption&gt; &lt;thead&gt; &lt;tr&gt; &lt;th scope=&quot;col&quot;&gt;Position&lt;/th&gt; &lt;th scope=&quot;col&quot;&gt;Astronaut&lt;/th&gt; &lt;/tr&gt; &lt;/thead&gt; &lt;tbody&gt; &lt;tr&gt; &lt;td&gt;Commander&lt;/td&gt; &lt;td&gt;Neil A. Armstrong&lt;/td&gt; &lt;/tr&gt; &lt;tr&gt; &lt;td&gt;Command Module Pilot&lt;/td&gt; &lt;td&gt;Michael Collins&lt;/td&gt; &lt;/tr&gt; &lt;tr&gt; &lt;td&gt;Lunar Module Pilot&lt;/td&gt; &lt;td&gt;Edwin &amp;quot;Buzz&amp;quot; E. Aldrin, Jr.&lt;/td&gt; &lt;/tr&gt; &lt;/tbody&gt; &lt;/table&gt; &lt;p&gt;Launched by a &lt;strong&gt;Saturn V&lt;/strong&gt; rocket from &lt;a href=&quot;http://en.wikipedia.org/wiki/Kennedy_Space_Center&quot; title=&quot;Kennedy Space Center&quot;&gt;Kennedy Space Center&lt;/a&gt; in Merritt Island, Florida on July 16, Apollo 11 was the fifth manned mission of &lt;a href=&quot;http://en.wikipedia.org/wiki/NASA&quot; title=&quot;NASA&quot;&gt;NASA&lt;/a&gt;&amp;#39;s Apollo program. The Apollo spacecraft had three parts:&lt;/p&gt; &lt;ol&gt; &lt;li&gt;&lt;strong&gt;Command Module&lt;/strong&gt; with a cabin for the three astronauts which was the only part which landed back on Earth&lt;/li&gt; &lt;li&gt;&lt;strong&gt;Service Module&lt;/strong&gt; which supported the Command Module with propulsion, electrical power, oxygen and water&lt;/li&gt; &lt;li&gt;&lt;strong&gt;Lunar Module&lt;/strong&gt; for landing on the Moon.&lt;/li&gt; &lt;/ol&gt; &lt;p&gt;After being sent to the Moon by the Saturn V&amp;#39;s upper stage, the astronauts separated the spacecraft from it and travelled for three days until they entered into lunar orbit. Armstrong and Aldrin then moved into the Lunar Module and landed in the &lt;a href=&quot;http://en.wikipedia.org/wiki/Mare_Tranquillitatis&quot; title=&quot;Mare Tranquillitatis&quot;&gt;Sea of Tranquility&lt;/a&gt;. They stayed a total of about 21 and a half hours on the lunar surface. After lifting off in the upper part of the Lunar Module and rejoining Collins in the Command Module, they returned to Earth and landed in the &lt;a href=&quot;http://en.wikipedia.org/wiki/Pacific_Ocean&quot; title=&quot;Pacific Ocean&quot;&gt;Pacific Ocean&lt;/a&gt; on July 24.&lt;/p&gt; &lt;hr/&gt; &lt;p style=&quot;text-align: right;&quot;&gt;&lt;small&gt;Source: &lt;a href=&quot;http://en.wikipedia.org/wiki/Apollo_11&quot;&gt;Wikipedia.org&lt;/a&gt;&lt;/small&gt;&lt;/p&gt;</textarea>

			<input type="text" placeholder="Page slug" />

			<button type="submit" class="btn btn-large btn-cms-orange">Save changes</button>
			<button type="button" class="btn btn-large btn-cms">Cancel</button>
		</form>

	</section>

	<div style="clear:both;"></div>

<script src="http://code.jquery.com/jquery-1.9.1.min.js"></script>
<script src="http://code.jquery.com/jquery-migrate-1.1.0.min.js"></script>
<script src="<?php echo base_url(); ?>assets/admin/js/bootstrap.min.js"></script>
<script src="<?php echo base_url(); ?>assets/admin/js/select2.min.js"></script>
<script src="<?php echo base_url(); ?>assets/admin/js/bootstrap.datepicker.js"></script>
<script src="<?php echo base_url(); ?>assets/admin/jquery.filedrop.js"></script>
<script src="<?php echo base_url(); ?>assets/admin/js/main.js"></script>
</body>
</html>
