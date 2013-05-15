<table class="table tbl-custom">
	<thead>
		<tr>
			<th>Name</th>
			<th>Description</th>
			<th class="text-center">Enabled</th>
			<th class="action-add"><a href="<?php echo current_url().'/create';?>"><img src="<?php echo base_url(); ?>assets/admin/img/icon-add.gif" alt="Add" /></a></th>
		</tr>
	</thead>
	<tbody>
		<?php foreach ($modules as $module): ?>
		<tr>
			<td><?php echo $module->name; ?></td>
			<td><?php echo $module->description; ?></td>
			<td class="text-center"><?php echo $module->enable ? '<i class="icon-ok-sign icon-large"></i>' : '<i class="icon-circle-blank icon-large"></i>'; ?></td>
			<td class="action">
				<a class="action-icon" href="#">Action</a>
				<ul class="action-list" style="display: none;">
					<li><a href="<?php echo site_url('admin/modules/edit/'.$module->id); ?>"><i class="icon-edit icon-large"></i></a></li>
				</ul>
			</td>
		</tr>
		<?php endforeach;?>
	</tbody>
</table>
