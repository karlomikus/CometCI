<?php echo validation_errors(); ?>
<ul class="nav nav-pills">
	<li class="active"><a href="#tab1" data-toggle="tab"><i class="icon-cogs"></i> Global settings</a></li>
	<li><a href="#tab2" data-toggle="tab"><i class="icon-gamepad"></i> Clan settings</a></li>
	<li><a href="#tab3" data-toggle="tab"><i class="icon-user"></i> User settings</a></li>
</ul>

<?php echo form_open_multipart(uri_string(), array('class' => 'cms-form')); ?>

<div class="tab-content">

	<div class="tab-pane active" id="tab1">
		<input placeholder="Site name" class="input-xxlarge" type="text" name="sitename" />

		<input placeholder="Admin email" class="input-xlarge" type="text" name="clanname" />

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

		<textarea placeholder="Site closed message" name="closedmsg" class="input-xxlarge"></textarea>

		<input placeholder="Analytics code" class="input-xlarge" type="text" name="clanname" />
	</div>

	<div class="tab-pane" id="tab2">
		<input placeholder="Clan name" type="text" name="clanname" />
	</div>

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

</div>

<?php echo form_close(); ?>

<script>

</script>