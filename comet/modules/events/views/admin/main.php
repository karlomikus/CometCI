<table class="table tbl-custom">
	<thead>
		<tr>
			<th>Name</th>
			<th>Starting date</th>
			<th>Ending date</th>
			<th class="action-add"><a href="<?php echo current_url().'/create';?>"><img src="<?php echo base_url(); ?>assets/admin/img/icon-add.gif" alt="Add" /></a></th>
		</tr>
	</thead>
	<tbody>
		<?php foreach ($events as $event): ?>
		<tr>
			<td><?php echo $event->name; ?></td>
			<td><?php echo $event->startdate; ?></td>
			<td><?php echo $event->enddate; ?></td>
			<td class="action">
				<a class="action-icon" href="#">Action</a>
				<ul class="action-list" style="display: none;">
					<li><a class="confirm-delete" href="<?php echo site_url('admin/events/delete/'.$event->id); ?>"><i class="icon-trash icon-large"></i></a></li>
					<li><a href="<?php echo site_url('admin/events/edit/'.$event->id); ?>"><i class="icon-edit icon-large"></i></a></li>
				</ul>
			</td>
		</tr>
		<?php endforeach;?>
	</tbody>
</table>
