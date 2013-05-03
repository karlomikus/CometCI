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
	body { margin: 30px 0; background: #eee; }
	.wrap { background: #fff; padding: 20px; border: 2px solid rgba(0,0,0,0.3); font-size: 1em; }
	.header { padding-bottom: 20px; }
	.button-group { }
	.textcenter { text-align: center; }
	.textleft { text-align: left; }
	.textright { text-align: right; }
	.match img { margin: 0 auto; }
	a { color: #ED6A50; }
	a:hover, a:focus { color: #B73A3A; }
	.button { border: none; box-shadow: none; background-color: #ED6A50; }
	.button:hover, .button:focus { background-color: #B73A3A; }

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
	<div class="large-4 columns"><h4>CLANNAME</h4></div>
	<div class="large-8 columns">
		<ul class="button-group" style="float: right;">
			<li><a href="{{base_url('posts')}}" class="small button">Posts</a></li>
			<li><a href="{{base_url('matches')}}" class="small button">Matches</a></li>
			<li><a href="{{base_url('roster')}}" class="small button">Roster</a></li>
			<li><a href="{{base_url('roster')}}" class="small button">Forums</a></li>
			<li><a href="{{base_url('roster')}}" class="small button">Gallery</a></li>
			<li><a href="{{base_url('roster')}}" class="small button">Contact</a></li>
			<li><a href="{{base_url('roster')}}" class="small button">About</a></li>
		</ul>
	</div>
	<hr />
  </div>
  
  <div class="row">
  
	<div class="large-8 columns">
	  {{template.body}}
	</div>

	<div class="large-4 columns">
		<h6>USER AREA</h6>{{widget('user')}}
		<hr />
		<h6>LATEST MATCHES</h6>{{widget('matches')}}
		<hr />
		<h6>LATEST POSTS</h6>{{widget('posts')}}
		<hr />
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