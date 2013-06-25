<?php if($this->session->flashdata('create_error')) : ?>
<div class="alert alert-error">
	<button type="button" class="close" data-dismiss="alert">&times;</button>
	<?php echo $this->session->flashdata('create_error'); ?>
</div>
<?php endif; ?>

<?php echo validation_errors(); ?>
<?php echo form_open_multipart(uri_string(), array('class' => 'cms-form')); ?>

	<input placeholder="Name" class="input-xlarge" type="text" name="name" value="<?php echo isset($data) ? $data['name'] : set_value("name"); ?>" />

	<input placeholder="Event link" class="input-xlarge" type="text" name="link" value="<?php echo isset($data) ? $data['link'] : set_value("link"); ?>" />

	<br />

	<textarea placeholder="Description" name="description" style="width: 40%;" rows="5"><?php echo isset($data) ? $data['description'] : set_value("description"); ?></textarea>
	
	<br />

	<input placeholder="Starting date" class="datepicker span3" type="text" name="startdate" value="<?php echo isset($data) ? date('Y-m-d', strtotime($data['startdate'])) : set_value("startdate"); ?>" />
	<input placeholder="Starting time" class="timepicker span2" type="text" name="starttime" value="<?php echo isset($data) ? date('H:i', strtotime($data['startdate'])) : set_value("starttime"); ?>" />

	<br />

	<input placeholder="Ending date" class="datepicker span3" type="text" name="enddate" value="<?php echo isset($data) ? date('Y-m-d', strtotime($data['enddate'])) : set_value("enddate"); ?>" />
	<input placeholder="Ending time" class="timepicker span2" type="text" name="endtime" value="<?php echo isset($data) ? date('H:i', strtotime($data['enddate'])) : set_value("endtime"); ?>" />

	<br />

	<div class="cms-upload">
		<?php if(isset($data) && !empty($data['image'])): ?>
		<img src="<?php echo base_url(); ?>uploads/events/<?php echo $data['image']; ?>" alt="" />
		<hr />
		<?php endif; ?>
		<p>Choose event image</p> <a class="btn btn-cms-orange show-file-input" href="#file-input"><i class="icon-cloud-upload"></i></a>
	</div>

	<button type="submit" class="btn btn-large btn-cms-orange">Save label</button>
	<button type="button" class="btn btn-large btn-cms goback">Cancel</button>
	<input id="file-input" class="hidden" type="file" name="image" size="1" />

<?php echo form_close(); ?>