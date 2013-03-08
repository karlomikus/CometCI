<table class="table table-striped">
	<tr>
		<th width="30%">Opponent</th>
		<th width="25%">Date</th>
		<th width="15%">Game</th>
		<th class="text-center" width="15%">Result</th>
		<th width="15%"></th>
	</tr>
	<?php foreach ($matches as $match): ?>
	<tr>
		<td><?php echo $this->opponents_m->get($match->opponent)->name; ?></td>
		<td><?php echo $match->date; ?></td>
		<td><?php echo $this->games_m->get($match->game)->name; ?></td>
		<td class="text-center"><?php echo $this->matches_m->get_match_outcome($match->id); ?></td>
		<td class="text-center">
			<div class="btn-toolbar">
				<div class="btn-group">
					<a class="btn btn-dark" href="<?php echo site_url('admin/matches/edit/'.$match->id); ?>"><i class="icon-pencil"></i></a>
					<a class="btn btn-dark" href="<?php echo site_url('admin/matches/delete/'.$match->id); ?>"><i class="icon-remove"></i></a>
				</div>
			</div>
		</td>
	</tr>
	<?php endforeach;?>
</table>
