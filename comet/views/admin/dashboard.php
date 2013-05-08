<div class="row-fluid">
	<div class="span4 cms-box">
		<header class="box-title">
			<h4><?php echo date('l, jS \of F Y'); ?></h4>
		</header>
		<ul id="event-tabs">
			<li><a class="active" href="#matches-tab" data-toggle="tab"><i class="icon-trophy"></i> Matches</a></li>
			<li><a href="#events-tab" data-toggle="tab"><i class="icon-calendar"></i> Events</a></li>
		</ul>
		<div class="box-content tab-content">
			<ul id="matches-tab" class="match-list tab-pane fade in active">
				<?php foreach ($matches as $match): ?>
				<li>
					<img src="http://placehold.it/50x50" alt="pic" />
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
		Stats go here
	</div>
</div>