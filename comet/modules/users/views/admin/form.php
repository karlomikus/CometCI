<?php echo form_open(uri_string(), array('class' => 'cms-form')); ?>

    <input placeholder="Username" type="text" name="username" value="<?php echo isset($userdata) ? $userdata['username'] : set_value("username"); ?>" />

    <input placeholder="Email" type="text" name="email" value="<?php echo isset($userdata) ? $userdata['email'] : set_value("email"); ?>" />

    <input placeholder="Password" type="password" name="password" />

    <input placeholder="Confirm password" type="password" name="password_confirm" />

    <select placeholder="Choose default group(s)" class="js_select input-xlarge" name="groups[]" multiple>
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