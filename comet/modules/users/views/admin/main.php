<table class="table tbl-custom">
    <thead>
        <tr>
            <th>Username</th>
            <th>Email</th>
            <th>Groups</th>
            <th>Status</th>
            <th class="action-add"><a href="<?php echo current_url().'/create';?>"><img src="<?php echo base_url(); ?>assets/admin/img/icon-add.gif" alt="Add" /></a></th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($users as $user):?>
        <tr>
            <td><?php echo $user->username;?></td>
            <td><?php echo $user->email;?></td>
            <td>
                <?php foreach ($user->groups as $group):?>
                <span class="label label-info"><?php echo $group->name; ?></span>
                <?php endforeach?>
            </td>
            <td><?php echo ($user->active) ? '<span class="label label-success">Active</span>' : '<span class="label label-important">Inactive</span>';?></td>
            <td class="action">
                <a class="action-icon" href="#">Action</a>
                <ul class="action-list" style="display: none;">
                    <li><a href="<?php echo site_url('admin/users/delete/'.$user->id); ?>"><i class="icon-trash icon-large"></i></a></li>
                    <li><a href="<?php echo site_url('admin/users/edit/'.$user->id); ?>"><i class="icon-edit icon-large"></i></a></li>
                    <li><a href="<?php echo site_url('admin/users/edit/'.$user->id); ?>"><i class="icon-unlock icon-large"></i></a></li>
                    <li><a href="<?php echo site_url('admin/users/edit/'.$user->id); ?>"><i class="icon-lock icon-large"></i></a></li>
                </ul>
            </td>
        </tr>
        <?php endforeach;?>
    </tbody>
</table>

<div class="pagination pagination-right pagination-large">
    <?php echo $pagination; ?>
</div>