<article class="step step-2">
	<h3>Server requirements</h3>

	<p>
		Comet CMS requires at least PHP version 5.3, a MySQL database layer and a GD Library for manipulation of images. Please note that CMS will function without GD library but advanced features like image resizing wont be possible.
	</p>

	<ul class="no-list">
		<li><?php echo $data->phpVersion; ?> PHP v5.3</li>
		<li><?php echo $data->sqlInstalled; ?> MySQL Database</li>
		<li><?php echo $data->gdInstalled; ?> GD Library</li>
	</ul>

	<p>
		Some folders require to be writable by CMS. These include uploads folder and all it's subfolders and a config folder so this installer can create custom database.php file.
	</p>

	<ul class="no-list">
		<?php foreach ($data->dirs as $dir => $status): ?>
		<li>
			<?php echo $status == 'pass' ? '<i class="icon-ok-circle pass"></i>' : '<i class="icon-remove-circle fail"></i>'; ?> 
			<?php echo $dir; ?>
		</li>
		<?php endforeach; ?>
	</ul>

	<div class="note">
		If automatic CHMOD fails you'll need manually set the required directories to CHMOD 0777.
	</div>

</article>