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

		<?php arsort($data->popularPlayers); ?>
		<div class="cms-box-content">
			<?php foreach (array_slice($data->popularPlayers, 0, 5) as $playerID => $rank): ?>
				<div class="media">
					<div class="pull-left">
						<img src="<?php echo base_url(); ?>/uploads/users/<?php echo get_avatar($playerID); ?>" style="height: 50px;" />
					</div>
					<div class="media-body">
						<h5 class="media-heading"><?php echo get_username($playerID); ?></h5>
						Played in <?php echo $rank; ?> games
					</div>
				</div>
			<?php endforeach; ?>
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
	new Morris.Area({
		element: 'year-graph',
		data: [
			{ month: '2013-01', wins: 20, draws: 4, loses: 3 },
			{ month: '2013-02', wins: 10, draws: 5, loses: 6 },
			{ month: '2013-03', wins: 30, draws: 4, loses: 3 },
			{ month: '2013-04', wins: 20, draws: 7, loses: 8 },
			{ month: '2013-05', wins: 10, draws: 3, loses: 2 },
			{ month: '2013-06', wins: 5, draws: 0, loses: 9 },
			{ month: '2013-07', wins: 20, draws: 1, loses: 3 },
			{ month: '2013-08', wins: 10, draws: 1, loses: 6 },
			{ month: '2013-09', wins: 25, draws: 4, loses: 3 },
			{ month: '2013-10', wins: 22, draws: 7, loses: 8 },
			{ month: '2013-11', wins: 10, draws: 9, loses: 2 },
			{ month: '2013-12', wins: 5, draws: 9, loses: 9 }
		],
		lineColors: ['#22c774', '#ff8400', '#c64747'],
		fillOpacity: 0.2,
		smooth: true,
		xkey: 'month',
		ykeys: ['wins', 'draws', 'loses'],
		labels: ['Wins', 'Draws', 'Loses'],
		behaveLikeLine: true
	});
});
</script>