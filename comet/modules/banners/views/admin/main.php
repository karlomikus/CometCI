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
			<th>Description</th>
			<th class="action-add"><a href="<?php echo current_url().'/create';?>"><img src="<?php echo base_url(); ?>assets/admin/img/icon-add.gif" alt="Add" /></a></th>
		</tr>
	</thead>
	<tbody>
		<?php if(!empty($banners)): ?>
		<?php foreach ($banners as $banner): ?>
		<tr>
			<td><?php echo ellipsize($banner->name, 20); ?></td>
			<td><?php echo ellipsize($banner->description, 120); ?></td>
			<td class="action">
				<a class="action-icon" href="#">Action</a>
				<ul class="action-list" style="display: none;">
					<li><a class="confirm-delete" href="<?php echo site_url('admin/banners/delete/'.$banner->id); ?>"><i class="icon-trash icon-large"></i></a></li>
					<li><a href="<?php echo site_url('admin/banners/edit/'.$banner->id); ?>"><i class="icon-edit icon-large"></i></a></li>
				</ul>
			</td>
		</tr>
		<?php endforeach;?>
		<?php else: ?>
		<tr>
			<td colspan="2" class="text-center">There are no banners to show. Create a new one!</td>
			<td class="text-right"><i class="icon-arrow-up"></i></td>
		</tr>
		<?php endif; ?>
	</tbody>
</table>
