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

<table class="table tbl-custom">
    <thead>
        <tr>
            <th>Title</th>
            <th>Date</th>
            <th>Author</th>
            <th>Label</th>
            <th class="action-add"><a href="<?php echo base_url().'admin/posts/create';?>"><img src="<?php echo base_url(); ?>assets/admin/img/icon-add.gif" alt="Add" /></a></th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($posts as $post): ?>
        <tr>
            <td><?php echo $post->title; ?></td>
            <td><?php echo $post->date; ?></td>
            <td><?php echo $this->ion_auth->user($post->author)->row()->username; ?></td>
            <td><?php echo get_label_name($post->label); ?></td>
            <td class="action">
                <a class="action-icon" href="#">Action</a>
                <ul class="action-list" style="display: none;">
                    <li><a class="confirm-delete" href="<?php echo site_url('admin/posts/delete/'.$post->id); ?>"><i class="icon-trash icon-large"></i></a></li>
                    <li><a href="<?php echo site_url('admin/posts/edit/'.$post->id); ?>"><i class="icon-edit icon-large"></i></a></li>
                </ul>
            </td>
        </tr>
        <?php endforeach;?>
    </tbody>
</table>
