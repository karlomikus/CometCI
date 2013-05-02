<!DOCTYPE html>
<html>
<head>
	<title>Title</title>

	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">

	<link rel="stylesheet" href="{{theme_asset('css/kube.min.css', 'defalt')}}">
	<link rel="stylesheet" href="{{theme_asset('css/master.css', 'defalt')}}">

	<script type="text/javascript" src="http://code.jquery.com/jquery.min.js"></script>

	<!--[if lt IE 9]>
	<script src="http://html5shiv.googlecode.com/svn/trunk/html5.js"></script>
	<![endif]-->

	<style type="text/css">
		.wi_default {
			margin: 0;
			padding: 0;
			list-style: none;
		}
		.wi_default li {
			overflow: hidden;
		}
		.wi_default img {
			float: left;
			margin-right: 7px;
		}
			.wi_default span {
			float: right;
		}
	</style>

</head>
<body>

	<div id="page">

		<header class="row">
			<div class="half">
				<h1>Clanname</h1>
			</div>
			<div class="half">
				Logged in as: {{user.username}}<br />
				<a href="{{base_url('admin')}}">Control Panel</a>
			</div>
		</header>

		<nav class="nav-pills">
		    <ul>
		    	<li><a href="{{base_url('posts')}}">Posts</a></li>
		        <li><a href="{{base_url('matches')}}">Matches</a></li>
		        <li><a href="{{base_url('users/profile')}}">Profile</a></li>
		    </ul>
		</nav>

		<div class="row">
			<div class="threequarter">{{template.body}}</div>
			<div class="quarter">
				<h5>LATEST MATCHES</h5>{{widget('matches')}}
				<hr />
				<h5>LATEST POSTS</h5>{{widget('posts')}}
			</div>
		</div>
	</div>

</body>
</html>