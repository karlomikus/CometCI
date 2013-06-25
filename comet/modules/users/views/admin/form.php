<?php echo validation_errors(); ?>
<?php echo form_open(uri_string(), array('class' => 'cms-form')); ?>

    <input placeholder="Username" type="text" name="username" value="<?php echo isset($userdata) ? $userdata['username'] : set_value("username"); ?>" />

    <br />

    <input placeholder="Email" type="text" name="email" value="<?php echo isset($userdata) ? $userdata['email'] : set_value("email"); ?>" />

    <br />

    <input placeholder="Password" type="password" name="password" />

    <br />

    <input placeholder="Confirm password" type="password" name="password_confirm" />

    <br />

    <select placeholder="Choose default group(s)" class="js_select input-xlarge no-margin-input" name="groups[]" multiple>
        <option value=""></option>
        <?php foreach($groups as $group): ?>
        <?php 
            $gID = $group->id;
            $checked = null;
            if (isset($current_groups)) {
                foreach($current_groups as $current) {
                    if ($gID == $current->id) {
                        $checked = 'selected';
                    }
                }
            }
         ?>
        <option value="<?php echo $group->id; ?>" <?php echo $checked; ?>><?php echo $group->name; ?></option>
        <?php endforeach; ?>
    </select>
    <span class="help-block">If you don't choose any group user will default to: members</span>

    <button type="submit" class="btn btn-large btn-cms-orange">Save match</button>
    <button type="button" class="btn btn-large btn-cms goback">Cancel</button>

<?php echo form_close(); ?>