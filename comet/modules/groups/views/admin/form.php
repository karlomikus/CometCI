<?php echo validation_errors(); ?>
<?php echo form_open(uri_string(), array('class' => 'cms-form')); ?>

    <input placeholder="Group name" type="text" name="name" value="<?php echo isset($data) ? $data['name'] : set_value("name"); ?>" />

    <textarea placeholder="Description" name="description" style="width: 40%;" rows="5"><?php echo isset($data) ? $data['description'] : set_value("description"); ?></textarea>

    <button type="submit" class="btn btn-large btn-cms-orange">Save post</button>
	<a class="btn btn-large btn-cms" href="<?php echo base_url(); ?>admin/<?php echo $this->uri->segment(2); ?>">Cancel</a>
<?php echo form_close(); ?>