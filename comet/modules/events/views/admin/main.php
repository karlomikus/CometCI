<?php if($this->session->flashdata('create_error')) : ?>
<div class="alert alert-error">
	<button type="button" class="close" data-dismiss="alert">&times;</button>
	<?php echo $this->session->flashdata('create_error'); ?>
</div>
<?php endif; ?>

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
			<td><?php echo cms_date($event->startdate); ?> - <?php echo cms_time($event->startdate); ?></td>
			<td><?php echo cms_date($event->enddate); ?> - <?php echo cms_time($event->enddate); ?></td>
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