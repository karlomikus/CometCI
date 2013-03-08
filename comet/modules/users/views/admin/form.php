<?php echo form_open(uri_string()); ?>

    <label>Username</label>
    <input type="text" name="username" value="<?php echo isset($userdata) ? $userdata['username'] : set_value("username"); ?>" />

    <label>Email</label>
    <input type="text" name="email" value="<?php echo isset($userdata) ? $userdata['email'] : set_value("email"); ?>" />

    <label>Password</label>
    <input type="password" name="password" />

    <label>Confirm Password</label>
    <input type="password" name="password_confirm" />

    <label>Choose default groups</label>
    <select class="js_select" name="groups[]" multiple>
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

    <hr />

    <?php echo form_submit(array('name' => 'save', 'value' => 'Save user', 'class' => 'btn btn-dark')); ?>

<?php echo form_close(); ?>