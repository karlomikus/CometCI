<table class="table tbl-custom">
	<thead>
		<tr>
			<th>Logo</th>
			<th>Name</th>
			<th>Description</th>
			<th width="150">Gaming team</th>
			<th class="action-add"><a href="<?php echo current_url().'/create';?>"><img src="<?php echo base_url(); ?>assets/admin/img/icon-add.gif" alt="Add" /></a></th>
		</tr>
	</thead>
	<tbody>
		<?php foreach ($teams as $team): ?>
		<tr>
			<td><img src="<?php echo base_url(); ?>/uploads/teams/<?php echo $team->logo; ?>" alt="<?php echo $team->id; ?>" width="45" height="45" /></td>
			<td><?php echo $team->name; ?></td>
			<td><?php echo ellipsize($team->description, 70); ?></td>
			<td><?php echo $team->type; ?></td>
			<td class="action">
				<a class="action-icon" href="#">Action</a>
                <ul class="action-list" style="display: none;">
                    <li><a class="confirm-delete" href="<?php echo site_url('admin/teams/delete/'.$team->id); ?>"><img src="<?php echo base_url(); ?>assets/admin/img/icon-action-delete.png" alt="" /></a></li>
                    <li><a href="<?php echo site_url('admin/teams/edit/'.$team->id); ?>"><img src="<?php echo base_url(); ?>assets/admin/img/icon-action-edit.png" alt="" /></a></li>
                </ul>
			</td>
		</tr>
	<?php endforeach;?>
	</tbody>
</table>
