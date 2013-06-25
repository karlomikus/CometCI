<article class="step step-2">
	<h3>Server requirements</h3>
	<p>Checking compatiblity</p>
	<ul>
		<li>PHP Version: 5.3 - <?php echo $data->phpVersion; ?></li>
		<li>MySQL Database: <?php echo $data->sqlInstalled; ?></li>
		<li>GD Library: <?php echo $data->gdInstalled; ?></li>
	</ul>
	<p>Checking CHMOD</p>
	<ul>
		<li>uploads/* - <?php echo $data->dirUploads; ?></li>
		<li>database.php.inc - <?php echo $data->dbFile; ?></li>
	</ul>
	<?php echo $data->settingChmod; ?>
</article>

<section class="action-bar">
	<a href="<?php echo base_url('install/step3') ?>" class="pure-button install-button">Next</a>
</section>