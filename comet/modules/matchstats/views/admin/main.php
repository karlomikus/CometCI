<script src="<?php echo base_url(); ?>assets/admin/js/raphael-min.js"></script>
<script src="http://cdn.oesmith.co.uk/morris-0.4.3.min.js"></script>
<?php 
$winRate = ($data->totalWins / $data->totalMatches) * 100;
$drawRate = ($data->totalDraws / $data->totalMatches) * 100;
$loseRate = ($data->totalLoses / $data->totalMatches) * 100;
?>
<div class="row-fluid">

	<div class="span4 cms-box">
		<div class="header-white">
			<h4 class="header-thin">Win rate</h4>
		</div>

		<div class="cms-box-content">

			<div class="progress-label">
				Wins <span class="pull-right"><?php echo $data->totalWins; ?>/<?php echo $data->totalMatches; ?></span>
			</div>
			<div class="progress">
				<div class="bar bar-success" style="width: <?php echo $winRate; ?>%;"></div>
			</div>

			<div class="progress-label">
				Draws <span class="pull-right"><?php echo $data->totalDraws; ?>/<?php echo $data->totalMatches; ?></span>
			</div>
			<div class="progress">
				<div class="bar bar-warning" style="width: <?php echo $drawRate; ?>%;"></div>
			</div>

			<div class="progress-label">
				Loses <span class="pull-right"><?php echo $data->totalLoses; ?>/<?php echo $data->totalMatches; ?></span>
			</div>
			<div class="progress">
				<div class="bar bar-danger" style="width: <?php echo $loseRate; ?>%;"></div>
			</div>

			<br />

			<div class="stats-box">
				<h2><?php echo number_format($winRate, 1); ?>%</h2>
				<small>Win rate</small>
			</div>

			<div class="stats-box">
				<h2><?php echo $data->totalMatches; ?></h2>
				<small>Matches played</small>
			</div>

			<div class="stats-box">
				<h2><?php echo $data->weekRate; ?></h2>
				<small>Matches this week</small>
			</div>
		</div>
	</div>

	<div class="span8 cms-box">
		<div class="header-white">
			<h4 class="header-thin">Year <?php echo date('Y') ?> progress</h4>
		</div>
		<div id="year-graph"></div>
	</div>

</div>

<div class="row-fluid">
	
	<div class="span4 cms-box">
		<div class="header-white">
			<h4 class="header-thin">Top 5 Active Players</h4>
		</div>

		<?php arsort($data->popularPlayers); $i=0; ?>
		<div class="cms-box-content">
			<?php foreach ($data->popularPlayers as $playerID => $rank): ?>
				<div class="media">
					<div class="pull-left">
						<img src="<?php echo base_url(); ?>/uploads/users/<?php echo get_avatar($playerID); ?>" style="height: 50px;" />
					</div>
					<div class="media-body">
						<h5 class="media-heading"><?php echo get_username($playerID); ?></h5>
						Played in <?php echo $rank; ?> games
					</div>
				</div>
				<?php if($i == 4) break; ?>
			<?php $i++; endforeach; ?>
		</div>
	</div>

	<div class="span4 cms-box">
		<div class="header-white">
			<h4 class="header-thin">Top 5 Best Games</h4>
		</div>

		<div class="cms-box-content">
			<?php foreach ($data->popularGames as $gameRank): ?>
				<div class="media">
					<div class="pull-left">
						<?php echo get_game_icon($gameRank->game, true); ?>
					</div>
					<div class="media-body">
						<h5 class="media-heading"><?php echo get_game_name($gameRank->game); ?></h5>
						Played <?php echo $gameRank->rank; ?> times
					</div>
				</div>
			<?php endforeach; ?>
		</div>
	</div>

	<div class="span4 cms-box">
		<div class="header-white">
			<h4 class="header-thin">Top 5 Teams</h4>
		</div>

		<div class="cms-box-content">
			<?php foreach ($data->popularTeams as $teamRank): ?>
				<div class="media">
					<div class="pull-left">
						<img src="<?php echo base_url(); ?>/uploads/teams/<?php echo get_logo($teamRank->team, 'team'); ?>" style="height: 50px;" />
					</div>
					<div class="media-body">
						<h5 class="media-heading"><?php echo get_team_name($teamRank->team); ?></h5>
						Played <?php echo $teamRank->rank; ?> times
					</div>
				</div>
			<?php endforeach; ?>
		</div>
	</div>

</div>

<script>
$(document).ready(function() {
// Visits graph -----------------------------------
	new Morris.Bar({
		element: 'year-graph',
		data: <?php echo $data->generateStats; ?>,
		barColors: ['#22c774', '#ff8400', '#c64747'],
		xkey: 'month',
		stacked: true,
		parseTime: false,
		ykeys: ['wins', 'draws', 'loses'],
		labels: ['Wins', 'Draws', 'Loses']
	});
});
</script>