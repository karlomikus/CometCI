<table class="table tbl-custom">
	<thead>
		<tr>
			<th>Name</th>
			<th>Description</th>
			<th>Posts</th>
			<th class="action-add"><a href="<?php echo current_url().'/create';?>"><img src="<?php echo base_url(); ?>assets/admin/img/icon-add.gif" alt="Add" /></a></th>
		</tr>
	</thead>
	<tbody>
		<?php foreach ($labels as $label): ?>
		<tr>
			<td><?php echo $label->name; ?></td>
			<td><?php echo $label->description; ?></td>
			<td><?php echo $this->labels_m->count_posts_in_label($label->id); ?></td>
			<td class="action">
				<a class="action-icon" href="#">Action</a>
				<ul class="action-list" style="display: none;">
					<li><a href="<?php echo site_url('admin/labels/delete/'.$label->id); ?>"><img src="<?php echo base_url(); ?>assets/admin/img/icon-action-delete.png" alt="" /></a></li>
					<li><a href="<?php echo site_url('admin/labels/edit/'.$label->id); ?>"><img src="<?php echo base_url(); ?>assets/admin/img/icon-action-edit.png" alt="" /></a></li>
				</ul>
			</td>
		</tr>
		<?php endforeach;?>
	</tbody>
</table>
