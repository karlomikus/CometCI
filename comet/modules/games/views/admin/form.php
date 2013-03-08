<?php echo validation_errors(); ?>
<?php echo form_open_multipart(uri_string()); ?>

    <label>Game title</label>
    <input type="text" name="name" value="<?php echo isset($data) ? $data['name'] : set_value("name"); ?>" />

    <label>Game shortcode</label>
    <input type="text" name="shortcode" value="<?php echo isset($data) ? $data['shortcode'] : set_value("shortcode"); ?>" />

    <label>Icon</label>
    <?php if(isset($data['icon'])): ?>
        <img src="<?php echo base_url(); ?>/assets/admin/games/<?php echo $data['icon']; ?>" />
    <?php endif; ?>
    <input type="file" name="icon" size="20" />
    
    <br>
    <div class="form-actions">
        <?php echo form_submit(array('name' => 'save', 'value' => 'Save game', 'class' => 'btn btn-primary')); ?>
    </div>

<?php echo form_close(); ?>