<?php echo validation_errors(); ?>
<ul class="nav nav-pills">
	<li class="active"><a href="#tab1" data-toggle="tab"><i class="icon-cogs"></i> Global settings</a></li>
	<li><a href="#tab2" data-toggle="tab"><i class="icon-gamepad"></i> Clan settings</a></li>
	<li><a href="#tab3" data-toggle="tab"><i class="icon-user"></i> User settings</a></li>
	<li><a href="#tab4" data-toggle="tab"><i class="icon-tasks"></i> Backup</a></li>
</ul>

<?php echo form_open_multipart(uri_string(), array('class' => 'cms-form')); ?>

<div class="tab-content">

	<!-- Globa settings -->
	<div class="tab-pane active" id="tab1">
		<input placeholder="Site name" class="input-xxlarge" type="text" name="sitename" />

		<input placeholder="Admin email" class="input-xlarge" type="text" name="clanname" />

		<input placeholder="Homepage" class="input-xlarge inputip" type="text" name="clanname" title="Module which will be your frontpage" />

		<select placeholder="Default theme" name="theme" class="js_select input-xlarge">
			<option></option>
			<option value="1">Theme 1</option>
			<option value="1">Theme 2</option>
			<option value="1">Theme 3</option>
		</select>

		<select placeholder="Default theme layout" name="theme" class="js_select input-xlarge">
			<option></option>
			<option value="1">Full page</option>
			<option value="1">Page with sidebar</option>
		</select>

		<ul class="check-list">
			<li>
				<input id="check-comments" type="checkbox" name="comments" value="1" checked>
				<label for="check-comments">Enable comments</label>
			</li>
			<li>
				<input id="check-close-website" type="checkbox" name="closed" value="1">
				<label for="check-close-website">Close website</label>
			</li>
		</ul>

		<input placeholder="Time between comment posts" type="text" name="clanname" />

		<textarea placeholder="Site closed message" name="closedmsg" class="input-xxlarge"></textarea>

		<input placeholder="Analytics code" class="input-xlarge" type="text" name="clanname" />
	</div>
	
	<!-- Clan Settings -->
	<div class="tab-pane" id="tab2">
		<input placeholder="Clan name" type="text" name="clanname" />
	</div>
	
	<!-- User settings -->
	<div class="tab-pane" id="tab3">
		<ul class="check-list">
			<li>
				<input id="check-registration" type="checkbox" name="comments" value="1" checked>
				<label for="check-registration">Enable registration</label>
			</li>
			<li>
				<input id="check-activation" type="checkbox" name="comments" value="1">
				<label for="check-activation">Enable mail activation</label>
			</li>
		</ul>
	</div>

	<!-- Backup Settings -->
	<div class="tab-pane" id="tab4">
		<ul class="check-list">
			<li>
				<input id="check-backup" type="checkbox" name="comments" value="1" checked>
				<label for="check-backup">Backup uploads folder</label>
			</li>
		</ul>

		<button class="btn btn-cms-orange">Backup</button>
	</div>

</div>

<?php echo form_close(); ?>

<script>

</script>