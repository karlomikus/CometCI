<table class="table table-striped">
    <tr>
        <th width="5%" align="center">Icon</th>
        <th width="80%">Name</th>
        <th width="15%">Action</th>
    </tr>
    <?php foreach ($games as $game): ?>
    <tr>
        <td align="center"><img src="<?php echo base_url(); ?>/assets/admin/games/<?php echo $game->icon; ?>" alt="<?php echo $game->shortcode; ?>" /></td>
        <td><?php echo $game->name; ?></td>
        <td>
            <a class="btn" href="<?php echo site_url('admin/games/edit/'.$game->id); ?>"><i class="icon-pencil"></i></a>
            <a class="btn" href="<?php echo site_url('admin/games/delete/'.$game->id); ?>"><i class="icon-remove"></i></a>
        </td>
    </tr>
    <?php endforeach;?>
</table>
