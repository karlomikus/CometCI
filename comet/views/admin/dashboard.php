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
					<img src="<?php echo base_url(); ?>/uploads/opponents/<?php echo get_opponent_logo($match->opponent); ?>" alt="" style="width: 50px; height: 50px;" />
					<p>
						<a href="<?php echo base_url(); ?>matches/show/<?php echo $match->id; ?>" target="_blank"><?php echo get_opponent_name($match->opponent); ?></a> <br />
						<span><?php echo cms_time($match->date); ?> - <?php echo !empty(get_event_data($match->event)->name) ? get_event_data($match->event)->name : 'Scrim'; ?></span>
					</p>
				</li>
				<?php endforeach; ?>
			</ul>

			<ul id="events-tab" class="match-list tab-pane fade in">
				<?php foreach ($events as $event): ?>
				<?php
					if(isset($event->image)) $eventImage = $event->image;
					else $eventImage = 'nopic.jpg';
				?>
				<li>
					<img src="<?php echo base_url(); ?>/uploads/events/<?php echo $eventImage; ?>" alt="" style="width: 50px; height: 50px;" />
					<p>
						<a href="<?php echo base_url(); ?>events/show/<?php echo $event->id; ?>" target="_blank"><?php echo $event->name; ?></a> <br />
						<span>Starting at <?php echo cms_time($event->startdate); ?></span>
					</p>
				</li>
				<?php endforeach; ?>
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
						<option value="<?php echo $m; ?>" <?php echo (date("n") == $m) ? 'selected' : ''; ?>><?php echo date("F", mktime(0, 0, 0, $m)); ?></option>
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
					<?php
						if(count($resultstr) == 1) {
							array_unshift($resultstr, '0');
							echo implode(",", $resultstr);
						}
						elseif(!empty($resultstr)) {
							echo implode(",", $resultstr);
						}
						else echo '0,0';
					?>
				</span>
			</div>
		</div>
		<div class="row-fluid mini-stats">
			<div class="span7">
				<h4><?php echo $countposts; ?></h4>
				<small>Total Forum Posts</small>
			</div>
			<div class="span4">
				<span class="inlinesparkline">
					<?php $resultstr = array(); foreach ($postsstats as $stat): ?>
						<?php $resultstr[] = $stat->total; ?>
					<?php endforeach; ?>
					<?php
						if(count($resultstr) == 1) {
							array_unshift($resultstr, '0');
							echo implode(",", $resultstr);
						}
						elseif(!empty($resultstr)) {
							echo implode(",", $resultstr);
						}
						else echo '0,0';
					?>
				</span>
			</div>
		</div>
		<div class="row-fluid mini-stats">
			<div class="span7">
				<h4><?php echo $countopics; ?></h4>
				<small>Total Topics</small>
			</div>
			<div class="span4">
				<span class="inlinesparkline">
					<?php $resultstr = array(); foreach ($topicsstats as $stat): ?>
						<?php $resultstr[] = $stat->total; ?>
					<?php endforeach; ?>
					<?php
						if(count($resultstr) == 1) {
							array_unshift($resultstr, '0');
							echo implode(",", $resultstr);
						}
						elseif(!empty($resultstr)) {
							echo implode(",", $resultstr);
						}
						else echo '0,0';
					?>
				</span>
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
		<?php foreach ($visits as $date => $total): ?>
			{ month: '<?php echo $date; ?>', value: <?php echo $total; ?> },
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