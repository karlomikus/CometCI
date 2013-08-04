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
		</div>
	</div>

	<div class="span8 cms-box">
		Nice graph todo...
	</div>

</div>