<table class="table table-striped">
    <tr>
        <th>Username</th>
        <th>Email</th>
        <th>Groups</th>
        <th>Status</th>
        <th>Action</th>
    </tr>
    <?php foreach ($users as $user):?>
    <tr>
        <td><?php echo $user->username;?></td>
        <td><?php echo $user->email;?></td>
        <td>
            <?php foreach ($user->groups as $group):?>
            <?php echo anchor("admin/groups/edit/".$group->id, $group->name) ;?><br />
            <?php endforeach?>
        </td>
        <td><?php echo ($user->active) ? anchor("admin/users/deactivate/".$user->id, 'Active') : anchor("admin/users/activate/". $user->id, 'Inactive');?></td>
        <td>
            <a class="btn" href="<?php echo site_url('admin/users/edit/'.$user->id); ?>"><i class="icon-pencil"></i></a>
            <a class="btn" href="<?php echo site_url('admin/users/delete/'.$user->id); ?>"><i class="icon-remove"></i></a>
        </td>
    </tr>
    <?php endforeach;?>
</table>