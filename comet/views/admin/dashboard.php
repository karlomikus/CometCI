<script src="<?php echo base_url(); ?>assets/admin/js/raphael-min.js"></script>
<script src="http://cdn.oesmith.co.uk/morris-0.4.3.min.js"></script>
<script src="<?php echo base_url(); ?>assets/admin/js/jquery.sparkline.min.js"></script>

<div class="row-fluid">
	<div class="span4 cms-box">
		<header class="box-title">
			<h4><?php echo date('l, jS \of F Y'); ?></h4>
		</header>
		<ul id="event-tabs">
			<li class="active"><a href="#matches-tab" data-toggle="tab"><i class="icon-trophy"></i> Matches</a></li>
			<li><a href="#events-tab" data-toggle="tab"><i class="icon-calendar"></i> Events</a></li>
		</ul>
		<div class="box-content tab-content">
			<ul id="matches-tab" class="match-list tab-pane fade in active">
				<?php foreach ($matches as $match): ?>
				<li>
					<img src="<?php echo base_url(); ?>/uploads/opponents/<?php echo get_opponent_logo($match->opponent); ?>" alt="" width="50" height="50" />
					<p>
						<a href="<?php echo base_url(); ?>matches/show/<?php echo $match->id; ?>" target="_blank"><?php echo get_opponent_name($match->opponent); ?></a> <br />
						<span>18:45 - ESL Master LEague</span>
					</p>
				</li>
				<?php endforeach; ?>
			</ul>

			<ul id="events-tab" class="match-list tab-pane fade in">
				<li>
					<img src="http://placehold.it/50x50" alt="pic" />
					<p>
						<a href="#">Team Coolermaster2</a> <br />
						<span>18:45 - ESL Master LEague</span>
					</p>
				</li>
			</ul>
		</div>
	</div>
	<div class="span8 cms-box">
		<div class="row-fluid">
			<div class="span6 header-white">
				<h4 class="header-thin">Unique visits this month</h4>
			</div>
			<div class="span6 text-right">
				<select name="month" id="stats-month">
					<?php for($m = 1; $m <= 12; $m++): ?>
						<option value="<?php echo $m; ?>"><?php echo date("F", mktime(0, 0, 0, $m)); ?></option>
					<?php endfor; ?>
				</select>
			</div>
		</div>
		<div id="cms-page-views"></div>
	</div>
</div>

<div class="row-fluid">
	<div class="span4 cms-box">
		<div class="row-fluid mini-stats">
			<div class="span7">
				<h4><?php echo $countcomments; ?></h4>
				<small>Total Comments</small>
			</div>
			<div class="span4">
				<span class="inlinesparkline">
					<?php $resultstr = array(); foreach ($commentstats as $stat): ?>
						<?php $resultstr[] = $stat->total; ?>
					<?php endforeach; ?>
					<?php echo implode(",", $resultstr); ?>
				</span>
			</div>
		</div>
		<div class="row-fluid mini-stats">
			<div class="span7">
				<h4>53</h4>
				<small>Total Posts</small>
			</div>
			<div class="span4">
				<span class="inlinesparkline">5,6,7,9,9,6,8,10,8,4,6,7</span>
			</div>
		</div>
		<div class="row-fluid mini-stats">
			<div class="span7">
				<h4>64</h4>
				<small>Total Topics</small>
			</div>
			<div class="span4">
				<span class="inlinesparkline">5,6,7,9,9,6,8,10,8,4,6,7</span>
			</div>
		</div>
	</div>
</div>

<script>
	$('.inlinesparkline').sparkline('html',{
	    type: 'line',
	    width: '150',
	    height: '40',
	    lineColor: '#9b9eaf',
	    fillColor: '#eeeeee',
	    spotColor: false,
	    minSpotColor: false,
	    maxSpotColor: false,
	    highlightSpotColor: '#d64644',
	    highlightLineColor: '#cccccc',
	    spotRadius: 3,
	    drawNormalOnTop: false
	});

	new Morris.Line({
		element: 'cms-page-views',
		data: [
		<?php
		if($visits != NULL) {
		foreach ($visits as $visit): ?>
			{ month: '<?php echo date("Y-m-d", strtotime($visit->date)); ?>', value: <?php echo $visit->total; ?> },
		<?php endforeach; } else { echo '{month: '.date("Y-m-d").', value: 0}'; } ?>
		],
		lineColors: ['#9b9eaf'],
		pointFillColors: ['#D64644'],
		fillOpacity: 0.4,
		smooth: true,
		xkey: 'month',
		xLabelFormat: function(d) { return d.getDate(); },
		ykeys: ['value'],
		labels: ['Visits']
	});
</script>