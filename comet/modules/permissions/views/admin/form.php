<h1><?php echo $title; ?></h1>
<?php echo form_open("permissions/admin/save"); ?>

    <label>Permission title</label>
    <?php echo form_input('title'); ?>

    <label>Description</label>
    <?php echo form_textarea('description'); ?>

    <div class="row-fluid">
        <div class="span5">
            <label>Allow access to:</label>
            <select multiple id="allowselect" size="10" name="allowed[]">
            <?php foreach ($modules as $module): ?>
                
                <option value="<?php echo $module->id; ?>"><?php echo $module->name; ?></option>
                 
            <?php endforeach; ?>
            </select>
        </div>
        <div class="span2">
            <a class="btn" href="#" id="allow">deny -&gt;</a>
            <br><br>
            <a class="btn" href="#" id="deny">&lt;- allow</a>
        </div> 
        <div class="span5">
            <label>Deny access from:</label>
            <select multiple id="denyselect" size="10" name="denied[]">
            </select>
        </div>
    </div>

    <br>

    <?php echo form_submit(array('name' => 'save', 'value' => 'Save permission', 'class' => 'btn btn-primary')); ?>

<?php echo form_close(); ?>