<?php echo $template['partials']['head']; ?>
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
<script src="<?php echo base_url(); ?>assets/admin/js/jquery.icheck.min.js"></script>
<script src="<?php echo base_url(); ?>assets/admin/js/jquery.cookie.js"></script>
<script src="<?php echo base_url(); ?>assets/admin/js/main.js"></script>
</body>
</html>