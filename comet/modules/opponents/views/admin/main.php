<table class="table tbl-custom">
    <thead>
        <tr>
            <th>Team Logo</th>
            <th>Name</th>
            <th>Description</th>
            <th class="action-add"><a href="<?php echo current_url().'/create';?>"><img src="<?php echo base_url(); ?>assets/admin/img/icon-add.gif" alt="Add" /></a></th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($opponents as $opponent): ?>
        <tr>
            <td><img src="<?php echo base_url(); ?>/uploads/opponents/<?php echo $opponent->logo; ?>" alt="" width="40" height="40" /></td>
            <td><?php echo $opponent->name; ?></td>
            <td><?php echo ellipsize($opponent->info, 80); ?></td>
            <td class="action">
                <a class="action-icon" href="#">Action</a>
                <ul class="action-list" style="display: none;">
                    <li><a href="<?php echo site_url('admin/opponents/delete/'.$opponent->id); ?>"><img src="<?php echo base_url(); ?>assets/admin/img/icon-action-delete.png" alt="" /></a></li>
                    <li><a href="<?php echo site_url('admin/opponents/edit/'.$opponent->id); ?>"><img src="<?php echo base_url(); ?>assets/admin/img/icon-action-edit.png" alt="" /></a></li>
                </ul>
            </td>
        </tr>
        <?php endforeach;?>
    </tbody>
</table>
