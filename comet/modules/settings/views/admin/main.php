<?php echo validation_errors(); ?>

<ul class="nav nav-tabs nav-tabs-cms">
	<li class="active"><a href="#tab1" data-toggle="tab">Global settings</a></li>
	<li><a href="#tab2" data-toggle="tab">Clan settings</a></li>
	<li><a href="#tab3" data-toggle="tab">User settings</a></li>
	<li><a href="#tab4" data-toggle="tab">Backup</a></li>
	<li class="pull-right">Last modified: <?php echo cms_date($data->date); ?> - <?php echo cms_time($data->date); ?></li>
</ul>

<?php echo form_open_multipart(uri_string(), array('class' => 'cms-form')); ?>

<div class="tab-content">

	<!-- Global settings -->
	<div class="tab-pane active" id="tab1">

		<label class="input-label">Site name</label>
		<input placeholder="Site name" class="input-xxlarge" type="text" name="sitename" value="<?php echo $data->sitename; ?>" />
	
		<label class="input-label">Admin Email</label>
		<input placeholder="Admin email" class="input-xlarge" type="text" name="adminmail" value="<?php echo $data->adminmail; ?>" />
		
		<label class="input-label">Default theme and layout</label>
		<select placeholder="Select default theme" name="theme" class="js_select input-xlarge">
			<option></option>
			<?php foreach($themes as $theme): ?>
				<option value="<?php echo $theme; ?>" <?php echo $data->theme == $theme ? 'selected' : ''; ?>><?php echo ucfirst($theme); ?></option>
			<?php endforeach; ?>
		</select>

		<select placeholder="Default theme layout" name="layout" class="js_select input-xlarge">
			<option></option>
			<?php foreach($layouts as $layout): ?>
				<?php $dbLayout = preg_replace("/\\.[^.\\s]{3,4}$/", "", $layout); ?>
				<option value="<?php echo $dbLayout; ?>" <?php echo $data->layout == $dbLayout ? 'selected' : ''; ?>><?php echo $layout; ?></option>
			<?php endforeach; ?>
		</select>

		<ul class="check-list">
			<li>
				<input id="check-comments" type="checkbox" name="comments" value="1" <?php echo $data->comments == 1 ? 'checked' : ''; ?>>
				<label for="check-comments">Enable comments</label>
			</li>
			<li>
				<input id="check-close-website" type="checkbox" name="closed" value="1" <?php echo $data->closed == 1 ? 'checked' : ''; ?>>
				<label for="check-close-website">Close website</label>
			</li>
		</ul>
		
		<label class="input-label">Site closed message</label>
		<textarea placeholder="Site closed message" name="closedmsg" class="input-xxlarge"><?php echo $data->closedmsg; ?></textarea>

		<label class="input-label">Delay comment posts</label>
		<input placeholder="Comment delay" class="inputip" type="text" name="commentdelay" title="Time in seconds between comment posts" value="<?php echo $data->commentsdelay; ?>" />
		
		<label class="input-label">Analyitics code</label>
		<input class="input-xlarge" type="text" name="analytics" value="<?php echo $data->analytics; ?>" />
	</div>
	
	<!-- Clan Settings -->
	<div class="tab-pane" id="tab2">
		<label class="input-label">Clan Name</label>
		<input type="text" name="clanname" value="<?php echo $data->clanname; ?>" />

		<label class="input-label">Clan Tag</label>
		<input type="text" name="clantag" value="<?php echo $data->clantag; ?>" />
	</div>
	
	<!-- User settings -->
	<div class="tab-pane" id="tab3">
		<ul class="check-list">
			<li>
				<input id="check-registration" type="checkbox" name="registration" value="1" checked>
				<label for="check-registration">Enable registration</label>
			</li>
			<li>
				<input id="check-activation" type="checkbox" name="mailactivation" value="1">
				<label for="check-activation">Enable mail activation</label>
			</li>
		</ul>
	</div>

	<!-- Backup Settings -->
	<div class="tab-pane" id="tab4">
		<ul class="check-list">
			<li>
				<input id="check-backup" type="checkbox" name="backupuploads" value="1" checked>
				<label for="check-backup">Backup uploads folder</label>
			</li>
		</ul>

		<a href="<?php echo base_url(); ?>admin/settings/backup" class="btn btn-cms">Backup</a>

		<div class="alert alert-info alert-block">
			<h4>Note</h4>
			Due to the limited execution time and memory available to PHP, backing up very large databases may not be possible. If your database is very large you might need to backup directly from your SQL server via the command line, or have your server admin do it for you if you do not have root privileges.
		</div>
	</div>

	<button type="submit" class="btn btn-cms-orange">Save settings</button>

</div>

<?php echo form_close(); ?>