<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title>Clan Comet v0.02 Alpha - Control Panel</title>
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta name="description" content="Clan Comet CMS site administration">
	<meta name="author" content="Karlo Mikus">
	<link href='http://fonts.googleapis.com/css?family=Merriweather+Sans:300,400,700,800|Sintony:400,700' rel='stylesheet' type='text/css'>
	<link href="<?php echo base_url(); ?>assets/admin/css/bootstrap.min.css" rel="stylesheet">
	<link href="<?php echo base_url(); ?>assets/admin/css/font-awesome.min.css" rel="stylesheet">
	<link href="<?php echo base_url(); ?>assets/admin/css/select2.css" rel="stylesheet">
	<link href="<?php echo base_url(); ?>assets/admin/css/main.css" rel="stylesheet">
	<!--[if lt IE 9]>
	<script src="<?php echo base_url(); ?>/assets/admin/js/html5shiv.js"></script>
	<![endif]-->
	<script src="http://code.jquery.com/jquery-1.9.1.min.js"></script>
	<script src="http://code.jquery.com/jquery-migrate-1.1.0.min.js"></script>
	<script>var baseUrl = "<?php echo base_url(); ?>";</script>
</head>
<body>
<?php
	$avatar = 'noavatar.jpg';
	if(isset($user->avatar)) $avatar = $user->avatar;
?>
	<header class="site-header">
		<a class="avatar" href="#"><img src="<?php echo base_url(); ?>assets/admin/img/logo.png" width="32" height="32" /></a>

		<h1><?php echo isset($title) ? $title : 'Undefined module'; ?></h1>

		<ul>
			<li class="first"></li>
			<li><a href="#"><img src="<?php echo base_url(); ?>uploads/users/<?php echo $avatar; ?>" width="32" height="32" /></a></li>
			<li><a href="#"><img src="<?php echo base_url(); ?>assets/admin/img/sidebar/icon-pm.png" alt="Messagess" /></a></li>
			<li><a href="/cms" target="_blank"><img src="<?php echo base_url(); ?>assets/admin/img/sidebar/icon-view.png" alt="View site" /></a></li>
		</ul>
	</header>

	<?php echo $template['partials']['sidebar']; ?>

	<section class="site-content">
		
		<?php echo $template['body']; ?>

	</section>

	<div style="clear:both;"></div>

<script src="<?php echo base_url(); ?>assets/admin/js/bootstrap.min.js"></script>
<script src="<?php echo base_url(); ?>assets/admin/js/select2.min.js"></script>
<script src="<?php echo base_url(); ?>assets/admin/js/bootstrap.datepicker.js"></script>
<script src="<?php echo base_url(); ?>assets/admin/js/ckeditor/ckeditor.js"></script>
<script src="<?php echo base_url(); ?>assets/admin/js/bootbox.min.js"></script>
<script src="<?php echo base_url(); ?>assets/admin/js/main.js"></script>
</body>
</html>