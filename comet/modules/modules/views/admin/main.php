<table class="table tbl-custom">
	<thead>
		<tr>
			<th width="200">Name</th>
			<th width="600">Description</th>
			<th class="text-center">Enabled</th>
			<th class="action-add"><a href="<?php echo current_url().'/refresh';?>"><img src="<?php echo base_url(); ?>assets/admin/img/icon-add.gif" alt="Add" /></a></th>
		</tr>
	</thead>
	<tbody>
		<?php foreach ($modules as $module): ?>
		<tr>
			<td><?php echo $module->name; ?></td>
			<td><?php echo $module->description; ?></td>
			<td class="text-center"><?php echo $module->enabled ? '<i class="icon-ok-sign icon-large icon-enable"></i>' : '<i class="icon-ok-sign icon-large icon-disable"></i>'; ?></td>
			<td class="action">
				<a class="action-icon" href="#">Action</a>
				<ul class="action-list" style="display: none;">
					<li><a href="<?php echo site_url('admin/modules/edit/'.$module->id); ?>"><i class="icon-edit icon-large"></i></a></li>
					<li>
						<?php if($module->enabled == 1): ?>
						<a href="<?php echo site_url('admin/modules/disable/'.$module->id); ?>"><i class="icon-circle-blank icon-large"></i></a>
						<?php else: ?>
						<a href="<?php echo site_url('admin/modules/enable/'.$module->id); ?>"><i class="icon-ok-sign icon-large"></i></a>
						<?php endif; ?>
					</li>
				</ul>
			</td>
		</tr>
		<?php endforeach;?>
	</tbody>
</table>
