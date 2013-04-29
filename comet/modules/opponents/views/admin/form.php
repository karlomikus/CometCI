<?php echo validation_errors(); ?>
<?php echo form_open_multipart(uri_string(), array('class' => 'cms-form')); ?>

    <input placeholder="Name" class="input-xxlarge" type="text" name="name" value="<?php echo set_value("name", @$data['name']); ?>" />

    <textarea placeholder="Description" name="description" style="width: 40%;" rows="5"><?php echo isset($data) ? $data['info'] : set_value("description"); ?></textarea>

    <select name="game" class="js_select_game input-xxlarge">
        <?php foreach($games as $game): ?>
        <option value="<?php echo $game->id; ?>" data-icon="<?php echo $game->icon; ?>" <?php echo isset($data) ? set_select('game', $data['gameID'], $game->id==$data['gameID'] ? TRUE : FALSE) : set_select('game'); ?>><?php echo $game->name; ?></option>
        <?php endforeach; ?>
    </select>

    <div class="cms-upload">
        <?php if(isset($data['logo'])): ?>
        <img src="<?php echo base_url(); ?>/uploads/opponents/<?php echo $data['logo']; ?>" alt="" width="100" height="100" />
        <hr />
        <?php endif; ?>
        <p>Choose team logo</p> <a class="btn btn-cms-orange show-file-input" href="#"><i class="icon-cloud-upload"></i></a>
    </div>

    <button type="submit" class="btn btn-large btn-cms-orange">Save label</button>
    <a class="btn btn-large btn-cms" href="<?php echo base_url(); ?>admin/<?php echo $this->uri->segment(2); ?>">Cancel</a>
    <input id="file-input" class="hidden" type="file" name="logo" size="1" />

<?php echo form_close(); ?>