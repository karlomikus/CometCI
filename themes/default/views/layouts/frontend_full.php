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
  <script src="//ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
  <script src="{{theme_asset('js/vendor/custom.modernizr.js')}}"></script>
  <style type="text/css">
	body { margin: 30px 0; background: #90CDDB; }
	.wrap { background: #fff; padding: 20px; box-shadow: 0 0 8px rgba(0,0,0,0.3); font-size: 1em; }
	.header { padding-bottom: 20px; }
	.button-group { }
	.textcenter { text-align: center; }
	.textleft { text-align: left; }
	.textright { text-align: right; }
	.match img { margin: 0 auto; }
	a { color: #B73A3A; }
	a:hover, a:focus { color: #399EB5; }
	.button { border: none; box-shadow: none; background-color: #B73A3A; }
	.button:hover, .button:focus { background-color: #399EB5; }
	.panel { padding: 10px; }
	.pagination li.current a { background: #B73A3A; }
	
	.forum-list {
		list-style: none;
	}
	.forum-list li {
		border: 1px solid #D9D9D9;
		background: #fff;
		text-indent: 10px;
		margin: 5px 0;
	}

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
			<li><a href="{{base_url('forums')}}" class="small button">Forums</a></li>
			<li><a href="{{base_url('gallery')}}" class="small button">Gallery</a></li>
			<li><a href="{{base_url('contact')}}" class="small button">Contact</a></li>
			<li><a href="{{base_url('page/about')}}" class="small button">About</a></li>
		</ul>
	</div>
	<hr />
  </div>
  
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