<article class="step step-2">
	<h3>Installation successful</h3>

	<?php echo @$this->session->flashdata('errors'); ?>

	<p>
		Congratulations, you have successfully installed Comet CMS. To access cms control panel first login with your account and choose control panel link in the user area. Also, please delete the following folders to stop any possible exploits:
	</p>

	<ul>
		<li>_install/</li>
		<li>comet/modules/install/</li>
	</ul>

	<div class="note">
		Not deleteing those directories can be a huge security risk!
	</div>

</article>