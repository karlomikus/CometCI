<table class="table tbl-custom">
	<thead>
		<tr>
			<th>Name</th>
			<th>Description</th>
			<th>Access</th>
			<th class="action-add"><a href="<?php echo current_url().'/create';?>"><img src="<?php echo base_url(); ?>assets/admin/img/icon-add.gif" alt="Add" /></a></th>
		</tr>
	</thead>
	<tbody>
		<?php foreach ($pages as $page): ?>
		<tr>
			<td><a href="<?php echo base_url(); ?>page/<?php echo $page->slug; ?>" target="_blank"><?php echo $page->name; ?></a></td>
			<td><?php echo ellipsize($page->description, 70); ?></td>
			<td><?php echo $page->access; ?></td>
			<td class="action">
				<a class="action-icon" href="#">Action</a>
				<ul class="action-list" style="display: none;">
					<li><a class="confirm-delete" href="<?php echo site_url('admin/pages/delete/'.$page->id); ?>"><i class="icon-trash icon-large"></i></a></li>
					<li><a href="<?php echo site_url('admin/pages/edit/'.$page->id); ?>"><i class="icon-edit icon-large"></i></a></li>
				</ul>
			</td>
		</tr>
		<?php endforeach;?>
	</tbody>
</table>
