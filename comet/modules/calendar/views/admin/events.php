<?php foreach($data as $event): ?>
<?php
	$eventName = 'Scrim';
	$eventData = get_event_data($event->event);
	if(!empty($eventData->name)) $eventName = $eventData->name;
?>
	<div class="event">
		<header class="event-header">
			Match @ <?php echo date('H:i', strtotime($event->date)); ?>
		</header>
		<div class="event-content">
			<h4><?php echo $eventName; ?> - Versus <?php echo get_opponent_name($event->opponent); ?></h4>
			<p>
				Game: <?php echo get_game_name($event->game); ?><br />
				<a href="<?php echo !empty($event->matchlink) ? $event->matchlink : '#' ?>" target="_blank">Details</a>
			</p>
		</div>
	</div>
<?php endforeach; ?>