<table class="table tbl-custom">
	<thead>
		<tr>
			<th>Title</th>
			<th>Date</th>
			<th>Author</th>
			<th>Label</th>
			<th class="action-add"><a href="<?php echo current_url().'/create';?>"><img src="<?php echo base_url(); ?>assets/admin/img/icon-add.gif" alt="Add" /></a></th>
		</tr>
	</thead>
	<tbody>
		<?php foreach ($posts as $post): ?>
		<tr>
			<td><?php echo $post->title; ?></td>
			<td><?php echo $post->date; ?></td>
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
