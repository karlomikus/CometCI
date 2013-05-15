<?php if($this->session->flashdata('create_error')) : ?>
<div class="alert alert-error">
	<button type="button" class="close" data-dismiss="alert">&times;</button>
	<?php echo $this->session->flashdata('create_error'); ?>
</div>
<?php endif; ?>
<table class="table tbl-custom">
	<thead>
		<tr>
			<th align="center" width="40">Icon</th>
			<th>Name</th>
			<th>Code</th>
			<th class="action-add"><a href="<?php echo current_url().'/create';?>"><img src="<?php echo base_url(); ?>assets/admin/img/icon-add.gif" alt="Add" /></a></th>
		</tr>
	</thead>
	<tbody>
		<?php foreach ($games as $game): ?>
		<tr>
			<td align="center"><img src="<?php echo base_url(); ?>/assets/games/<?php echo $game->icon; ?>" alt="<?php echo $game->shortcode; ?>" /></td>
			<td><?php echo $game->name; ?></td>
			<td><?php echo $game->shortcode; ?></td>
			<td class="action">
				<a class="action-icon" href="#">Action</a>
				<ul class="action-list" style="display: none;">
					<li><a class="confirm-delete" href="<?php echo site_url('admin/games/delete/'.$game->id); ?>"><i class="icon-trash icon-large"></i></a></li>
					<li><a href="<?php echo site_url('admin/games/edit/'.$game->id); ?>"><i class="icon-edit icon-large"></i></a></li>
				</ul>
			</td>
		</tr>
		<?php endforeach;?>
	</tbody>
</table>
