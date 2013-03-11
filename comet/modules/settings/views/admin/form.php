<?php echo validation_errors(); ?>
<?php echo form_open_multipart(uri_string()); ?>

    <label>Team name</label>
    <input type="text" name="name" value="<?php echo set_value("name", @$data['name']); ?>" />

    <label>Description</label>
    <textarea name="description" style="width: 40%;" rows="5"><?php echo isset($data) ? $data['info'] : set_value("description"); ?></textarea>

    <label>Team game</label>
    <select name="game">
        <?php foreach($games as $game): ?>
        <option value="<?php echo $game->id; ?>" <?php echo isset($data) ? set_select('game', $data['gameID'], $game->id==$data['gameID'] ? TRUE : FALSE) : set_select('game'); ?>><?php echo $game->name; ?></option>
        <?php endforeach; ?>
    </select>

    <label>Logo</label>
    <?php if(isset($data['logo'])): ?>
        <img src="<?php echo base_url(); ?>/uploads/opponents/<?php echo $data['logo']; ?>" alt="" width="100" height="100" />
        <br />
    <?php endif; ?>
    <input type="file" name="logo" size="20" />

    <br>

    <?php echo form_submit(array('name' => 'save', 'value' => 'Save group', 'class' => 'btn btn-primary')); ?>

<?php echo form_close(); ?>