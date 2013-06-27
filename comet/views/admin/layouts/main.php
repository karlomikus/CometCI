<?php echo $template['partials']['head']; ?>
<body>
	<header class="site-header">
		<a class="avatar" href="<?php echo base_url(); ?>admin"><img src="<?php echo base_url(); ?>assets/admin/img/logo.png" width="32" height="32" /></a>
		<h1>
			<?php echo isset($title) ? $title : 'Undefined module'; ?>
			<span class="ajax-load"><img src="<?php echo base_url(); ?>assets/admin/img/loading.gif" alt="Loading..." /></span>
		</h1>
		<ul>
			<li class="first"></li>
			<li>
				<a href="/cms" target="_blank">
					<img src="<?php echo base_url(); ?>assets/admin/img/sidebar/icon-search.png" alt="View site" />
				</a>
			</li>
			<li>
				<a href="/cms" target="_blank">
					<img src="<?php echo base_url(); ?>assets/admin/img/sidebar/icon-view.png" alt="View site" />
				</a>
			</li>
			<li>
				<a href="<?php echo base_url(); ?>admin/logout">
					<img src="<?php echo base_url(); ?>uploads/users/<?php echo get_avatar($user->id); ?>" width="32" height="32" />
				</a>
			</li>
		</ul>
	</header>

	<?php echo $template['partials']['sidebar']; ?>

	<section class="site-content">
		<?php echo $template['body']; ?>
	</section>

	<div style="clear:both;"></div>

	<?php echo $template['metadata']; ?>
</body>
</html>