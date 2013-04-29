<table class="table tbl-custom">
	<thead>
		<tr>
			<th>Opponent</th>
			<th>Date</th>
			<th>Game</th>
			<th class="text-center">Result</th>
			<th class="action-add"><a href="<?php echo current_url().'/create';?>"><img src="<?php echo base_url(); ?>assets/admin/img/icon-add.gif" alt="Add" /></a></th>
		</tr>
	</thead>
	<tbody>
	<?php foreach ($matches as $match): ?>
		<tr>
			<td><?php echo $this->opponents_m->get($match->opponent)->name; ?></td>
			<td><?php echo $match->date; ?></td>
			<td><?php echo $this->games_m->get($match->game)->name; ?></td>
			<td class="text-center"><?php echo $this->matches_m->get_match_outcome($match->id, true, true); ?></td>
			<td class="action">
				<a class="action-icon" href="#">Action</a>
				<ul class="action-list" style="display: none;">
					<li><a href="<?php echo site_url('admin/matches/delete/'.$match->id); ?>"><img src="<?php echo base_url(); ?>assets/admin/img/icon-action-delete.png" alt="" /></a></li>
					<li><a href="<?php echo site_url('admin/matches/edit/'.$match->id); ?>"><img src="<?php echo base_url(); ?>assets/admin/img/icon-action-edit.png" alt="" /></a></li>
				</ul>
			</td>
		</tr>
	<?php endforeach;?>
	</tbody>
</table>
