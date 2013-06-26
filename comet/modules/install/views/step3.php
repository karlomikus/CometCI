<?php echo form_open(base_url().'install/step4'); ?>
	<article class="step step-2">
		<h3>Database and User creation</h3>

		<?php echo @$this->session->flashdata('errors'); ?>

		<h4>MySQL Connection</h4>

		<input class="input" placeholder="Hostname" type="text" name="hostname" />
		<br />
		<input class="input" placeholder="Username" type="text" name="username" />
		<br />
		<input class="input" placeholder="Password" type="password" name="password" />
		<br />
		<input class="input" placeholder="Database" type="text" name="database" />

		<h4>Administrator</h4>

		<input class="input" placeholder="Username" type="text" name="ausername" />
		<br />
		<input class="input" placeholder="Password" type="password" name="apassword" />
		<br />
		<input class="input" placeholder="Mail" type="text" name="amail" />

	</article>

	<section class="action-bar">
		<button type="submit" class="pure-button install-button">Next</button>
	</section>
<?php echo form_close(); ?>