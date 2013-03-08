<h1>Groups</h1>
<p><a class="btn btn-primary" href="<?php echo site_url('admin/groups/create');?>"><i class="icon-plus icon-white"></i> Add group</a></p>
<table class="table table-striped">
    <tr>
        <th width="10%">Name</th>
        <th width="40%">Description</th>
        <th width="10%">Action</th>
    </tr>
    <?php foreach ($groups as $group): ?>
    <tr>
        <td><?php echo $group->name; ?></td>
        <td><?php echo $group->description; ?></td>
        <td>
            <a class="btn" href="<?php echo site_url('admin/groups/edit/'.$group->id); ?>"><i class="icon-pencil"></i></a>
            <a class="btn" href="<?php echo site_url('admin/groups/delete/'.$group->id); ?>"><i class="icon-remove"></i></a>
        </td>
    </tr>
    <?php endforeach;?>
</table>
