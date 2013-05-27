<script src="//cdnjs.cloudflare.com/ajax/libs/raphael/2.1.0/raphael-min.js"></script>
<script src="http://cdn.oesmith.co.uk/morris-0.4.3.min.js"></script>

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
				<li>
					<img src="http://placehold.it/50x50" alt="pic" />
					<p>
						<a href="#">Team Coolermaster</a> <br />
						<span>18:45 - ESL Master LEague</span>
					</p>
				</li>
				<li>
					<img src="http://placehold.it/50x50" alt="pic" />
					<p>
						<a href="#">Team Coolermaster</a> <br />
						<span>18:45 - ESL Master LEague</span>
					</p>
				</li>
				<li>
					<img src="http://placehold.it/50x50" alt="pic" />
					<p>
						<a href="#">Team Coolermaster</a> <br />
						<span>18:45 - ESL Master LEague</span>
					</p>
				</li>
				<li>
					<img src="http://placehold.it/50x50" alt="pic" />
					<p>
						<a href="#">Team Coolermaster</a> <br />
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
					<option value="1">May</option>
					<option value="1">September</option>
					<option value="1">August</option>
				</select>
			</div>
		</div>
		<div id="cms-page-views"></div>
	</div>
</div>

<div class="row-fluid">
	<div class="span4 cms-box">
		sadasda
	</div>
</div>

<script>
	new Morris.Line({
		element: 'cms-page-views',
		data: [
		<?php foreach ($visits as $visit): ?>
			{ month: '<?php echo date("Y-m-d", strtotime($visit->date)); ?>', value: <?php echo $visit->total; ?> },
		<?php endforeach; ?>
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