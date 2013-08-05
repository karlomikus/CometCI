<?php echo validation_errors(); ?>
<?php echo form_open_multipart(uri_string(), array('class' => 'cms-form')); ?>

	<select placeholder="Select opponent" class="js_select input-xlarge opponent_select" name="opponent">
		<option></option>
		<?php foreach($opponents as $opponent): ?>
		<option value="<?php echo $opponent->id; ?>" <?php echo isset($data) ? set_select('opponent', $data['opponent'], $opponent->id==$data['opponent'] ? TRUE : FALSE) : set_select('opponent'); ?>><?php echo $opponent->name; ?></option>
		<?php endforeach; ?>
	</select>

	<select placeholder="Select your team" class="js_select teamdropdown input-xlarge team_select" name="team">
		<option></option>
		<?php foreach($teams as $team): ?>
		<option value="<?php echo $team->id; ?>" <?php echo isset($data) ? set_select('team', $data['team'], $team->id==$data['team'] ? TRUE : FALSE) : set_select('team'); ?>><?php echo $team->name; ?></option>
		<?php endforeach; ?>
	</select>

	<br />

	<input placeholder="Date" class="span3 datepicker" type="text" name="date" value="<?php echo isset($data) ? date('Y-m-d', strtotime($data['date'])) : set_value("date"); ?>" />

	<input placeholder="Time" class="span2 timepicker reset-input" type="text" name="time" value="<?php echo isset($data) ? date('H:i', strtotime($data['date'])) : set_value("time"); ?>" />

	<br />

	<select placeholder="Choose game" class="js_select_game input-xxlarge" name="game">
		<option></option>
		<?php foreach($games as $game): ?>
		<option value="<?php echo $game->id; ?>" data-icon="<?php echo $game->icon; ?>" <?php echo isset($data) ? set_select('game', $data['game'], $game->id==$data['game'] ? TRUE : FALSE) : set_select('game'); ?>><?php echo $game->name; ?></option>
		<?php endforeach; ?>
	</select>

	<h4>Match scores</h4>

	<div id="admin-scores">
		<?php if(isset($scores)): ?>
		<?php $i=1; foreach($scores as $score): ?>
		<p>
			<input class="reset-input input-large" type="text" name="opponentscore[]" value="<?php echo $score->opponent; ?>" />
			<input class="reset-input input-large" type="text" name="teamscore[]" value="<?php echo $score->team; ?>" />
			<?php if($i == 1): ?>
			<a href="#" class="btn btn-cms-orange" id="admin-scores-add"><i class="icon-plus"></i></a>
			<?php else: ?>
			<a href="#" class="admin-scores-remove btn btn-cms-orange"><i class="icon-minus"></i></a>
			<?php endif; ?>
		</p>
		<?php $i++; endforeach; ?>
		<?php else: ?>
		<p>
			<input class="reset-input input-large" type="text" name="opponentscore[]" placeholder="Opponent score #1" />
			<input class="reset-input input-large" type="text" name="teamscore[]" placeholder="Team score #1" />
			<a id="admin-scores-add" class="btn btn-cms-orange" href="#"><i class="icon-plus"></i></a>
		</p>
		<?php endif; ?>
	</div>

	<h4>Player data</h4>

	<input placeholder="Opponent player list" class="input-xlarge" type="text" name="opplayers" value="<?php echo isset($data) ? $data['opponent-players'] : set_value("opponent-players"); ?>" />
	
	<br />

	<input placeholder="Choose team first" class="input-xxlarge cms-margin" type="hidden" id="teamplayers" name="team_players[]" />

	<h4>Additional data</h4>

	<select placeholder="Match type" class="js_select_no_search input-large" name="type">
	<?php if(isset($data)): ?>
		<option></option>
		<option value="0" <?php echo $data['type'] == 0 ? 'selected' : ''; ?>>1v1</option>
		<option value="1" <?php echo $data['type'] == 1 ? 'selected' : ''; ?>>2v2</option>
		<option value="2" <?php echo $data['type'] == 2 ? 'selected' : ''; ?>>3v3</option>
		<option value="3" <?php echo $data['type'] == 3 ? 'selected' : ''; ?>>4v4</option>
		<option value="4" <?php echo $data['type'] == 4 ? 'selected' : ''; ?>>5v5</option>
		<option value="5" <?php echo $data['type'] == 5 ? 'selected' : ''; ?>>Other</option>
	<?php else: ?>
		<option></option>
		<option value="0">1v1</option>
		<option value="1">2v2</option>
		<option value="2">3v3</option>
		<option value="3">4v4</option>
		<option value="4">5v5</option>
		<option value="5">Other</option>
	<?php endif; ?>
	</select>

	<select placeholder="Match status" class="js_select_no_search input-large" name="status">
	<?php if(isset($data)): ?>
		<option></option>
		<option value="0" <?php echo $data['status'] == 0 ? 'selected' : ''; ?>>Played</option>
		<option value="1" <?php echo $data['status'] == 1 ? 'selected' : ''; ?>>Upcoming</option>
		<option value="2" <?php echo $data['status'] == 2 ? 'selected' : ''; ?>>Delayed</option>
		<option value="3" <?php echo $data['status'] == 3 ? 'selected' : ''; ?>>Cancelled</option>
	<?php else: ?>
		<option></option>
		<option value="0">Played</option>
		<option value="1">Upcoming</option>
		<option value="2">Delayed</option>
		<option value="3">Cancelled</option>
	<?php endif; ?>
	</select>

	<br />

	<select placeholder="Choose an event" class="js_select_no_search input-xlarge" name="event">
		<option></option>
		<?php foreach($events as $event): ?>
		<option value="<?php echo $event->id; ?>" <?php echo isset($data) ? set_select('event', $data['event'], $event->id==$data['event'] ? TRUE : FALSE) : set_select('event'); ?>><?php echo $event->name; ?></option>
		<?php endforeach; ?>
	</select>

	<input placeholder="Matchlink" class="input-xlarge" type="text" name="matchlink" value="<?php echo isset($data) ? $data['matchlink'] : set_value("matchlink"); ?>" />

	<h4>Screenshots</h4>

	<div class="media-panel" id="screenshots">
		<ul class="clearfix">
			<?php if(isset($screenshots)): ?>
				<?php foreach($screenshots as $screenshot): ?>
				<li class="safe">
					<img src="<?php echo base_url(); ?>uploads/screenshots/<?php echo $screenshot->file; ?>" alt="Screen" />
					<input type="hidden" class="todelete" name="todelete[]" value="<?php echo $screenshot->file; ?>" />
				</li>
				<?php endforeach; ?>
			<?php endif; ?>

			<li class="addscreenshot"><i class="icon-cloud-upload icon-2x"></i></li>

			<input name="userfile[]" id="screenshotsfile" class="hidden" type="file" accept="image/*" multiple />
		</ul>
	</div>

    <textarea class="ckeditor" name="report" rows="7"><?php echo isset($data) ? $data['report'] : set_value("report", "Report content"); ?></textarea>
	
    <button type="submit" class="btn btn-large btn-cms-orange">Save match</button>
	<button type="button" class="btn btn-large btn-cms goback">Cancel</button>
<?php echo form_close(); ?>

<script type="text/javascript">
$(document).ready(function() {
// Match - Scores -----------------------------------
	var scntDiv = $('#admin-scores');
	var i = $('#admin-scores p').size() + 1;

	$('#admin-scores-add').live('click', function() {
		var inputhtml = '<p><input placeholder="Opponent score #'+i+'" class="reset-input input-large" type="text" name="opponentscore[]" /> <input placeholder="Team score #'+i+'" class="reset-input input-large" type="text" name="teamscore[]" /> <a href="#" class="admin-scores-remove btn btn-cms-orange"><i class="icon-minus"></i></a></p>';
		$(inputhtml).appendTo(scntDiv);
		i++;
		return false;
	});
	$('.admin-scores-remove').live('click', function() {
		if( i > 2 ) {
			$(this).parents('p').remove();
			i--;
		}
		return false;
	});

// Match populate team input -----------------------------------
	var team_id;
	var cct = $("input[name=csrf_comet]").val(); // Get CSRF token
	$(".teamdropdown").on("change", function (e){ 
		team_id = $(".teamdropdown").select2("data").id; 
		$.ajax({
			url: baseUrl+'admin/matches/fetch_team_members',
			type: 'POST',
			data: {
				id: team_id,
				csrf_comet: cct
			},
			dataType: 'json',
			cache: false,
			success: function(output) {
				$('#teamplayers').select2({
					data: output,
					multiple: true
				});
			}
		});
	});	

// Screenshots input -----------------------------------
	$(".addscreenshot").click(function() {
		$("#screenshots ul").children('li:not(:last):not(.safe)').remove();
		$("#screenshotsfile").click();
	});

	var deleteText = "delete ";
	$(".safe img").toggle(function()
	{
		$(this).css("border", "2px solid #D64644");
		$(this).parent().find('input:hidden').val(function(i,val)
		{ 
		    return 'delete ' + val;
		});
	}, function()
	{
		$(this).css("border", "2px solid transparent");
		$(this).parent().find('input:hidden').val(function(i,val)
		{ 
		    if(val.indexOf(deleteText) != -1) return val.replace(deleteText, '');
			else return val;
		});
	});
});
</script>