<table class="table tbl-custom">
	<thead>
		<tr>
			<th><?php echo sort_link('posts', 'Title', $linkdata->sortOrderLink, $linkdata->page, $linkdata->currentOrder); ?></th>
			<th><?php echo sort_link('posts', 'Date', $linkdata->sortOrderLink, $linkdata->page, $linkdata->currentOrder); ?></th>
			<th>Author</th>
			<th>Label</th>
			<th class="action-add"><a href="<?php echo base_url().'admin/posts/create';?>"><img src="<?php echo base_url(); ?>assets/admin/img/icon-add.gif" alt="Add" /></a></th>
		</tr>
	</thead>
	<tbody>
		<?php foreach ($posts as $post): ?>
		<tr>
			<td><?php echo $post->title; ?> <?php echo $post->state == 0 ? '<span class="label label-info">Draft</span>' : ''; ?></td>
			<td><?php echo cms_date($post->date); ?> - <?php echo cms_time($post->date); ?></td>
			<td><?php echo $this->ion_auth->user($post->author)->row()->username; ?></td>
			<td><?php echo get_label_name($post->label); ?></td>
			<td class="action">
				<a class="action-icon" href="#">Action</a>
				<ul class="action-list" style="display: none;">
					<li><a class="confirm-delete" href="<?php echo site_url('admin/posts/delete/'.$post->id); ?>"><i class="icon-trash icon-large"></i></a></li>
					<li><a href="<?php echo site_url('admin/posts/edit/'.$post->id); ?>"><i class="icon-edit icon-large"></i></a></li>
				</ul>
			</td>
		</tr>
		<?php endforeach;?>
	</tbody>
</table>

<div class="pagination pagination-right pagination-large">
	<?php echo $pagination; ?>
</div>