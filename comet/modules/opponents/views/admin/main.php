<table class="table table-striped">
    <tr>
        <th width="10%">Team Logo</th>
        <th width="20%">Name</th>
        <th width="50%">Description</th>
        <th width="20%">Action</th>
    </tr>
    <?php foreach ($opponents as $opponent): ?>
    <tr>
        <td><img src="<?php echo base_url(); ?>/uploads/opponents/<?php echo $opponent->logo; ?>" alt="" width="100" height="100" /></td>
        <td><?php echo $opponent->name; ?></td>
        <td><?php echo $opponent->info; ?></td>
        <td>
            <a class="btn" href="<?php echo site_url('admin/opponents/edit/'.$opponent->id); ?>"><i class="icon-pencil"></i></a>
            <a class="btn" href="<?php echo site_url('admin/opponents/delete/'.$opponent->id); ?>"><i class="icon-remove"></i></a>
        </td>
    </tr>
    <?php endforeach;?>
</table>
