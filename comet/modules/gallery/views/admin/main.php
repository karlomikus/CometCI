<table class="table tbl-custom">
	<thead>
		<tr>
			<th>Name</th>
			<th>Description</th>
			<th>Items</th>
			<th class="action-add"><a href="<?php echo base_url().'admin/gallery/create';?>"><img src="<?php echo base_url(); ?>assets/admin/img/icon-add.gif" alt="Add" /></a></th>
		</tr>
	</thead>
	<tbody>
		<?php if(!empty($galleries)): ?>
		<?php foreach ($galleries as $gallery): ?>
		<tr>
			<td><a href="<?php echo site_url('admin/gallery/images/'.$gallery->id); ?>"><?php echo $gallery->name; ?></a></td>
			<td><?php echo ellipsize($gallery->description, 75); ?></td>
			<td><?php echo count_gallery_items($gallery->id); ?></td>
			<td class="action">
				<a class="action-icon" href="#">Action</a>
				<ul class="action-list" style="display: none;">
					<li><a class="confirm-delete" href="<?php echo site_url('admin/gallery/delete/'.$gallery->id); ?>"><i class="icon-trash icon-large"></i></a></li>
					<li><a href="<?php echo site_url('admin/gallery/edit/'.$gallery->id); ?>"><i class="icon-edit icon-large"></i></a></li>
				</ul>
			</td>
		</tr>
		<?php endforeach;?>
		<?php else: ?>
		<tr>
			<td colspan="3" class="text-center">There are no galleries to show. Create a new one!</td>
			<td class="text-right"><i class="icon-arrow-up"></i></td>
		</tr>
		<?php endif; ?>
	</tbody>
</table>