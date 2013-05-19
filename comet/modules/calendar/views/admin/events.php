<?php foreach($data as $event): ?>
	<div class="event">
		<header class="event-header">
			Match @ <?php echo date('H:i', strtotime($event->date)); ?>
		</header>
		<div class="event-content">
			<h4>The International Qualifiers - Versus <?php echo get_opponent_name($event->opponent); ?></h4>
			<p>
				Game: <?php echo get_game_name($event->game); ?><br />
				<a href="<?php echo $event->matchlink; ?>">Details</a>
			</p>
		</div>
	</div>
<?php endforeach; ?>