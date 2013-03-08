<h1><?php echo $title; ?></h1>
<?php echo validation_errors(); ?>
<?php echo form_open(uri_string()); ?>

    <label>Group name</label>
    <input type="text" name="name" value="<?php echo isset($data) ? $data['name'] : set_value("name"); ?>" />

    <label>Description</label>
    <textarea name="description" style="width: 40%;" rows="5"><?php echo isset($data) ? $data['description'] : set_value("description"); ?></textarea>

    <label>Permission</label>
    <select>
        <option>Permission 1</option>
        <option>Permission 2</option>
        <option>Permission 3</option>
    </select>

    <br>

    <?php echo form_submit(array('name' => 'save', 'value' => 'Save group', 'class' => 'btn btn-primary')); ?>

<?php echo form_close(); ?>