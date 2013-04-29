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
                <?php echo anchor("admin/groups/edit/".$group->id, $group->name) ;?> 
                <?php endforeach?>
            </td>
            <td><?php echo ($user->active) ? anchor("admin/users/deactivate/".$user->id, 'Active') : anchor("admin/users/activate/". $user->id, 'Inactive');?></td>
            <td class="action">
                <a class="action-icon" href="#">Action</a>
                <ul class="action-list" style="display: none;">
                    <li><a href="<?php echo site_url('admin/users/delete/'.$user->id); ?>"><img src="<?php echo base_url(); ?>assets/admin/img/icon-action-delete.png" alt="" /></a></li>
                    <li><a href="<?php echo site_url('admin/users/edit/'.$user->id); ?>"><img src="<?php echo base_url(); ?>assets/admin/img/icon-action-edit.png" alt="" /></a></li>
                </ul>
            </td>
        </tr>
        <?php endforeach;?>
    </tbody>
</table>