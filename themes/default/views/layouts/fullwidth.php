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
  <link rel="stylesheet" href="{{theme_asset('css/theme.css')}}">
  <script src="//ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
  <script src="{{theme_asset('js/vendor/custom.modernizr.js')}}"></script>
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