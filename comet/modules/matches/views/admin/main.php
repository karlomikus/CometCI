<?php if($this->session->flashdata('create_error')) : ?>
<div class="alert alert-error">
	<button type="button" class="close" data-dismiss="alert">&times;</button>
	<?php echo $this->session->flashdata('create_error'); ?>
</div>
<?php endif; ?>

<table class="table tbl-custom">
	<thead>
		<tr>
			<th><?php echo sort_link('matches', 'Opponent', $linkdata->sortOrderLink, $linkdata->page, $linkdata->currentOrder); ?></th>
			<th><?php echo sort_link('matches', 'Date', $linkdata->sortOrderLink, $linkdata->page, $linkdata->currentOrder); ?></th>
			<th><?php echo sort_link('matches', 'Game', $linkdata->sortOrderLink, $linkdata->page, $linkdata->currentOrder); ?></th>
			<th class="text-center">Result</th>
			<th class="action-add"><a href="<?php echo current_url().'/create';?>"><img src="<?php echo base_url(); ?>assets/admin/img/icon-add.gif" alt="Add" /></a></th>
		</tr>
	</thead>
	<tbody>
		<?php if(!empty($matches)): ?>
		<?php foreach ($matches as $match): ?>
			<tr>
				<td><?php echo $this->opponents_m->get($match->opponent)->name; ?></td>
				<td><?php echo cms_date($match->date); ?> - <?php echo cms_time($match->date); ?></td>
				<td><?php echo $this->games_m->get($match->game)->name; ?></td>
				<td class="text-center"><?php echo $this->matches_m->get_match_outcome($match->id, 'html'); ?></td>
				<td class="action">
					<a class="action-icon" href="#">Action</a>
					<ul class="action-list" style="display: none;">
						<li><a class="confirm-delete" href="<?php echo site_url('admin/matches/delete/'.$match->id); ?>"><i class="icon-trash icon-large"></i></a></li>
						<li><a href="<?php echo site_url('admin/matches/edit/'.$match->id); ?>"><i class="icon-edit icon-large"></i></a></li>
					</ul>
				</td>
			</tr>
		<?php endforeach;?>
		<?php else: ?>
		<tr>
			<td colspan="4" class="text-center">There are no matches to show. Create a new one!</td>
			<td class="text-right"><i class="icon-arrow-up"></i></td>
		</tr>
		<?php endif; ?>
	</tbody>
</table>

<div class="pagination pagination-right pagination-large">
	<?php echo $pagination; ?>
</div>