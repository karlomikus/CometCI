<?php echo validation_errors(); ?>
<?php echo form_open_multipart(uri_string()); ?>

	<div class="row-fluid">
		<div class="span6 fieldset">

			<h4>Versus info</h4>

			<label>Opponent</label>
			<select class="js_select opponent_select" data-placeholder="Select opponent" name="opponent">
				<option></option>
				<?php foreach($opponents as $opponent): ?>
				<option value="<?php echo $opponent->id; ?>" <?php echo isset($data) ? set_select('opponent', $data['opponent'], $opponent->id==$data['opponent'] ? TRUE : FALSE) : set_select('opponent'); ?>><?php echo $opponent->name; ?></option>
				<?php endforeach; ?>
			</select>

			<label>Opponent team players</label>
			<div class="input-append">
				<input type="text" name="opplayers" />
				<span class="add-on js_tooltip" data-title="Divide player names by commas"><i class="icon-info-sign"></i></span>
			</div>

			<label>Team</label>
			<select class="js_select team_select" data-placeholder="Select your team" name="team">
				<option></option>
				<?php foreach($teams as $team): ?>
				<option value="<?php echo $team->id; ?>" <?php echo isset($data) ? set_select('team', $data['team'], $team->id==$data['team'] ? TRUE : FALSE) : set_select('team'); ?>><?php echo $team->name; ?></option>
				<?php endforeach; ?>
			</select> <i class="ajax-load icon-spinner icon-spin"></i>

			<div class="ajax-team-out"></div>

			<label>Match type</label>
			<select class="js_select" name="type">
				<option value="0">1v1</option>
				<option value="1">2v2</option>
				<option value="2">3v3</option>
				<option value="3">4v4</option>
				<option value="4">5v5</option>
				<option value="5">Other</option>
			</select>

		</div>
		<div class="span6 fieldset">

			<h4>Match info</h4>

			<label>Game</label>
			<select class="js_select" name="game">
				<?php foreach($games as $game): ?>
				<option value="<?php echo $game->id; ?>" <?php echo isset($data) ? set_select('game', $data['game'], $game->id==$data['game'] ? TRUE : FALSE) : set_select('game'); ?>><?php echo $game->name; ?></option>
				<?php endforeach; ?>
			</select>

			<label>Date and time</label>
			<div class="input-append date" data-date="<?php echo date('Y-m-d'); ?>" data-date-format="yyyy-mm-dd">
				<input type="text" name="date" value="<?php echo date('Y-m-d'); ?>" />
				<span class="add-on"><i class="icon-calendar"></i></span>
			</div> <input type="text" class="span2" name="time" value="<?php echo date('H:i'); ?>" />

			<label>Status</label>
			<select class="js_select" name="status">
				<option value="0">Played</option>
				<option value="1">Upcoming</option>
				<option value="2">Delayed</option>
				<option value="3">Cancelled</option>
			</select>

			<label>Matchlink</label>
			<div class="input-append">
				<input type="text" name="matchlink" />
				<span class="add-on js_tooltip" data-title="Dotabuff - dota:matchID"><i class="icon-question-sign"></i></span>
			</div>

		</div>
	</div>

	<hr />

	<div class="row-fluid">
		<div class="span12 fieldset">
			<h4>Scores</h4>

			<div id="admin-scores">
				<!-- <div class="row-fluid">
					<h5 class="span2">Team:</h5>
					<h5 class="span2">Opponent:</h5>
				</div> -->
				<p class="row-fluid">
					<input class="input-small span2" type="text" name="opponentscore[]" placeholder="Opponent score #1" />
					<input class="input-small span2" type="text" name="teamscore[]" placeholder="Team score #1" />
					<a id="admin-scores-add" class="btn btn-dark" href="#"><i class="icon-plus"></i></a>
				</p>
			</div>
		</div>
	</div>

	<hr />

	<div class="row-fluid">
		<div class="span12 fieldset">
			<h4>Screenshots</h4>
			<input name="userfile[]" id="screenshotsfile" type="file" accept="image/*" multiple />
			<div id="screenshots">
				<ul>
					<li class="addscreenshot"><i class="icon-plus icon-2x"></i></li>
				</ul>
			</div>
		</div>
	</div>

	<hr />

    <label>Match report</label>
    <textarea name="report" style="width: 40%;" rows="5"><?php echo isset($data) ? $data['report'] : set_value("report"); ?></textarea>

    <hr />

    <?php echo form_submit(array('name' => 'save', 'value' => 'Save match', 'class' => 'btn btn-dark')); ?>
<?php echo form_close(); ?>