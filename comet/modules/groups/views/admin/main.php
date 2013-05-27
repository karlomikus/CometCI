<table class="table tbl-custom">
    <thead>
        <tr>
            <th>Name</th>
            <th>Description</th>
            <th class="action-add"><a href="<?php echo current_url().'/create';?>"><img src="<?php echo base_url(); ?>assets/admin/img/icon-add.gif" alt="Add" /></a></th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($groups as $group): ?>
        <tr>
            <td><?php echo $group->name; ?></td>
            <td><?php echo $group->description; ?></td>
            <td class="action">
                <a class="action-icon" href="#">Action</a>
                <?php if($group->id == 1 || $group->id == 2): ?>

                <?php else: ?>
                <ul class="action-list" style="display: none;">
                    <li><a class="confirm-delete" href="<?php echo site_url('admin/groups/delete/'.$group->id); ?>"><i class="icon-trash icon-large"></i></a></li>
                    <li><a href="<?php echo site_url('admin/groups/edit/'.$group->id); ?>"><i class="icon-edit icon-large"></i></a></li>
                    <li><a href="<?php echo site_url('admin/groups/permissions/'.$group->id); ?>"><i class="icon-lock icon-large"></i></a></li>
                </ul>
                <?php endif; ?>
            </td>
        </tr>
        <?php endforeach;?>
    </tbody>
</table>
