<h1>Permissions</h1>
<p><a class="btn btn-primary" href="<?php echo site_url('permissions/admin/create');?>"><i class="icon-plus icon-white"></i> Create permission</a></p>
<table class="table table-striped">
    <tr>
        <th width="10%">Title</th>
        <th width="40%">Description</th>
        <th width="20%">Allowed</th>
        <th width="20%">Denied</th>
        <th width="10%">Action</th>
    </tr>
    <?php foreach ($permissions as $permission): ?>
    <tr>
        <td><?php echo $permission->name; ?></td>
        <td><?php echo $permission->description; ?></td>
        <td><?php echo $permission->allow; ?></td>
        <td><?php echo $permission->deny; ?></td>
        <td><a class="btn" href="#"><i class="icon-pencil"></i></a> <a class="btn" href="#"><i class="icon-remove"></i></a></td>
    </tr>
    <?php endforeach;?>
</table>
