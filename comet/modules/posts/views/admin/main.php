<table class="table table-striped">
	<tr>
		<th width="25%">Title</th>
		<th width="20%">Date</th>
		<th width="30%">Author</th>
		<th width="15%">Label</th>
		<th width="10%"></th>
	</tr>
	<?php foreach ($posts as $post): ?>
	<tr>
		<td><?php echo $post->title; ?></td>
		<td><?php echo $post->date; ?></td>
		<td><?php echo $this->ion_auth->user($post->author)->row()->username; ?></td>
		<td><?php echo $post->label; ?></td>
		<td>
			<a class="btn" href="<?php echo site_url('admin/posts/edit/'.$post->id); ?>"><i class="icon-pencil"></i></a>
			<a class="btn" href="<?php echo site_url('admin/posts/delete/'.$post->id); ?>"><i class="icon-remove"></i></a>
		</td>
	</tr>
	<?php endforeach;?>
</table>
