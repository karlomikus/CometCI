<?php echo validation_errors(); ?>
<?php echo form_open(uri_string()); ?>

    <label>Group name</label>
    <input type="text" name="name" value="<?php echo isset($data) ? $data['name'] : set_value("name"); ?>" />

    <label>Description</label>
    <textarea name="description" style="width: 40%;" rows="5"><?php echo isset($data) ? $data['description'] : set_value("description"); ?></textarea>

    <hr />

    <?php echo form_submit(array('name' => 'save', 'value' => 'Save group', 'class' => 'btn btn-dark')); ?>
<?php echo form_close(); ?>