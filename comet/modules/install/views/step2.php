<article class="step step-2">
	<h3>Server requirements</h3>

	<h4>Checking compatiblity</h4>
	<ul>
		<li><?php echo $data->phpVersion; ?> PHP v5.3</li>
		<li><?php echo $data->sqlInstalled; ?> MySQL Database</li>
		<li><?php echo $data->gdInstalled; ?> GD Library</li>
	</ul>

	<h4>Checking folder access</h4>
	<ul>
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

<section class="action-bar">
	<a href="<?php echo base_url('install/step3') ?>" class="pure-button install-button">Next</a>
</section>