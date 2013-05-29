<table class="table tbl-custom">
    <thead>
        <tr>
            <th colspan="2">Name</th>
            <th>Description</th>
            <th class="action-add"><a href="<?php echo current_url().'/create';?>"><img src="<?php echo base_url(); ?>assets/admin/img/icon-add.gif" alt="Add" /></a></th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($opponents as $opponent): ?>
        <?php 
            if(isset($opponent->logo)) $logo = $opponent->logo;
            else $logo = 'nopic.jpg';
        ?>
        <tr>
            <td width="40"><img src="<?php echo base_url(); ?>/uploads/opponents/<?php echo $logo; ?>" alt="" width="40" height="40" /></td>
            <td><?php echo $opponent->name; ?></td>
            <td><?php echo ellipsize($opponent->info, 80); ?></td>
            <td class="action">
                <a class="action-icon" href="#">Action</a>
                <ul class="action-list" style="display: none;">
                    <li><a class="confirm-delete" href="<?php echo site_url('admin/opponents/delete/'.$opponent->id); ?>"><i class="icon-trash icon-large"></i></a></li>
                    <li><a href="<?php echo site_url('admin/opponents/edit/'.$opponent->id); ?>"><i class="icon-edit icon-large"></i></a></li>
                </ul>
            </td>
        </tr>
        <?php endforeach;?>
    </tbody>
</table>
