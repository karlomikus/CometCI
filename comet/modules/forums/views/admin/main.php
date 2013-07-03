<?php if($this->session->flashdata('create_error')) : ?>
<div class="alert alert-error">
	<button type="button" class="close" data-dismiss="alert">&times;</button>
	<?php echo $this->session->flashdata('create_error'); ?>
</div>
<?php endif; ?>

<table class="table tbl-custom tbl-sortable">
	<thead>
		<tr>
			<th>Name</th>
			<th>Label</th>
			<th>Tags</th>
			<th class="action-add"><a href="<?php echo current_url().'/create';?>"><img src="<?php echo base_url(); ?>assets/admin/img/icon-add.gif" alt="Add" /></a></th>
		</tr>
	</thead>
	<tbody>
		<?php if(!empty($forums)): ?>
		<?php $i = 1; foreach ($forums as $forum): ?>
		<tr>
			<td><?php echo $forum->name; ?></td>
			<td><?php echo get_label_name($forum->label); ?></td>
			<td><span class="label label-info">Private</span></td>
			<td class="action">
				<a class="action-icon" href="#">Action</a>
				<ul class="action-list" style="display: none;">
					<li><a class="confirm-delete" href="<?php echo site_url('admin/forums/delete/'.$forum->id); ?>"><i class="icon-trash icon-large"></i></a></li>
					<li><a href="<?php echo site_url('admin/forums/edit/'.$forum->id); ?>"><i class="icon-edit icon-large"></i></a></li>
				</ul>
			</td>
		</tr>
		<?php $i++; endforeach;?>
		<?php else: ?>
		<tr>
			<td colspan="3" class="text-center">There are no forums to show. Create a new one!</td>
			<td class="text-right"><i class="icon-arrow-up"></i></td>
		</tr>
		<?php endif; ?>
	</tbody>
</table>
