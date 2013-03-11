<?php echo validation_errors(); ?>
<?php echo form_open_multipart(uri_string()); ?>

<label>CLANNAME:</label>
<input class="span4" type="text" name="clanname" value="" />

<?php echo form_close(); ?>