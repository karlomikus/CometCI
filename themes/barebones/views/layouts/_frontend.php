<!DOCTYPE html>
<!--[if IE 8]>    <html class="no-js lt-ie9" lang="en"> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js" lang="en"> <!--<![endif]-->
<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width" />
  <title>{{template.title}}</title>

  <link rel="stylesheet" href="{{theme_asset('css/normalize.css')}}">
  <link rel="stylesheet" href="{{theme_asset('css/foundation.min.css')}}">
  <link rel="stylesheet" href="{{theme_asset('css/font-awesome.min.css')}}">
  <script src="{{theme_asset('js/vendor/custom.modernizr.js')}}"></script>
  <style type="text/css">
	body { margin-top: 20px; background: #ccc; }
	.wrap { background: #fff; padding: 20px; }
	.header { padding-bottom: 20px; }
	.button-group { }
	.textcenter { text-align: center; }
	.textleft { text-align: left; }
	.textright { text-align: right; }
	.match img { margin: 0 auto; }

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

<div class="row wrap">

  <div class="row header">
	<div class="large-1 columns">
	  <img src="http://placehold.it/50x50" />
	</div>
	<div class="large-5 columns"><h4>CLANNAME</h4></div>
	<div class="large-6 columns text-right">
		Logged in as: {{user.username}}<br>
		<a href="{{base_url('admin')}}">Control Panel</a>
	</div>
  </div>
  
  <div class="row">
	<div class="large-12 columns">
	  <ul class="button-group">
		<li><a href="{{base_url('matches')}}" class="small button">Matches</a></li>
		<li><a href="{{base_url('posts')}}" class="small button">Posts</a></li>
		<li><a href="{{base_url('users/profile')}}" class="small button">Profile</a></li>
		<li><a href="{{base_url('roster')}}" class="small button">Roster</a></li>
	  </ul>
	</div>
  </div>
  
  <!-- End Nav and Banner -->

  <div class="row">
  	<div class="large-4 columns"><h6>LATEST MATCHES</h6><hr />{{widget('matches')}}</div>
  	<div class="large-4 columns"><h6>LATEST POSTS</h6><hr />{{widget('posts')}}</div>
  	<div class="large-4 columns"><h6>LATEST MATCHES</h6><hr />{{widget('matches')}}</div>
  </div>
  
  <!-- Main Content Section -->
  
  <div class="row">
  
	<div class="large-12 columns">
	  {{template.body}}
	</div>
		
  </div>
  
  <!-- Footer -->
  
  <footer class="row">
	<div class="large-12 columns text-center">
	  <hr />
	  <p>&copy; 2013 Copyright Clanname</p>
	</div> 
  </footer>

</div>

<script src="{{theme_asset('js/vendor/zepto.js')}}"></script>
<script src="{{theme_asset('js/foundation.min.js')}}"></script>

</body>
</html>