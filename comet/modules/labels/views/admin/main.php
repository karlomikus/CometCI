<table class="table table-striped">
	<tr>
		<th>Name</th>
		<th>Description</th>
		<th>Posts</th>
		<th></th>
	</tr>
	<?php foreach ($labels as $label): ?>
	<tr>
		<td><?php echo $label->name; ?></td>
		<td><?php echo $label->description; ?></td>
		<td><?php echo $this->labels_m->count_posts_in_label($label->id); ?></td>
		<td>
			<a class="btn" href="<?php echo site_url('admin/label/edit/'.$label->id); ?>"><i class="icon-pencil"></i></a>
			<a class="btn" href="<?php echo site_url('admin/label/delete/'.$label->id); ?>"><i class="icon-remove"></i></a>
		</td>
	</tr>
	<?php endforeach;?>
</table>
