<table class="table table-striped">
	<tr>
		<th width="15%">Logo</th>
		<th width="20%">Name</th>
		<th width="40%">Description</th>
		<th width="15%">Gaming team</th>
		<th width="10%"></th>
	</tr>
	<?php foreach ($teams as $team): ?>
	<tr>
		<td align="center"><img src="<?php echo base_url(); ?>/uploads/teams/<?php echo $team->logo; ?>" alt="<?php echo $team->id; ?>" /></td>
		<td><?php echo $team->name; ?></td>
		<td><?php echo $team->description; ?></td>
		<td><?php echo $team->type; ?></td>
		<td>
			<a class="btn" href="<?php echo site_url('admin/teams/edit/'.$team->id); ?>"><i class="icon-pencil"></i></a>
			<a class="btn js_popover" href="#<?php //echo site_url('admin/teams/delete/'.$team->id); ?>" data-original-title="Are you sure?" data-content="<?php echo htmlspecialchars('<a class="btn btn-success" href="'.site_url('admin/teams/delete/'.$team->id).'">Yes</a> <a class="btn btn-danger" href="#" data-dismiss="clickover">No</a>'); ?>" data-placement="top"><i class="icon-remove"></i></a>
		</td>
	</tr>
	<?php endforeach;?>
</table>
