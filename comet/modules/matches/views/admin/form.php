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
				<input type="text" name="opplayers" value="<?php echo isset($data) ? $data['opponent-players'] : set_value("opponent-players"); ?>" />
				<span class="add-on js_tooltip" data-title="Divide player names by commas"><i class="icon-info-sign"></i></span>
			</div>

			<label>Team</label>
			<select class="js_select team_select" data-placeholder="Select your team" name="team">
				<option></option>
				<?php foreach($teams as $team): ?>
				<option value="<?php echo $team->id; ?>" <?php echo isset($data) ? set_select('team', $data['team'], $team->id==$data['team'] ? TRUE : FALSE) : set_select('team'); ?>><?php echo $team->name; ?></option>
				<?php endforeach; ?>
			</select> <i class="ajax-load icon-spinner icon-spin"></i>

			<?php if(isset($data)): ?>
			<div class="ajax-team-out">
				<?php $team_players = explode(',', $data['team-players']); ?>
				<label>Your team players</label>
				<select class="js_select teamplayers" name="team_players[]" multiple>
				<?php foreach($this->teams_m->get_team_members($data['team']) as $team_member): ?>
					<?php $selected = ''; if(in_array($team_member['user_id'], $team_players)) $selected = 'selected'; ?>
					<option value="<?php echo $team_member['user_id']; ?>" <?php echo $selected; ?>><?php echo $this->ion_auth->user($team_member['user_id'])->row()->username; ?></option>
				<?php endforeach; ?>
				</select>
			</div>
			<?php else: ?>
			<div class="ajax-team-out"></div>
			<?php endif; ?>

			<label>Match type</label>
			<select class="js_select" name="type">
			<?php if(isset($data)): ?>
				<option value="0" <?php echo $data['type'] == 0 ? 'selected' : ''; ?>>1v1</option>
				<option value="1" <?php echo $data['type'] == 1 ? 'selected' : ''; ?>>2v2</option>
				<option value="2" <?php echo $data['type'] == 2 ? 'selected' : ''; ?>>3v3</option>
				<option value="3" <?php echo $data['type'] == 3 ? 'selected' : ''; ?>>4v4</option>
				<option value="4" <?php echo $data['type'] == 4 ? 'selected' : ''; ?>>5v5</option>
				<option value="5" <?php echo $data['type'] == 5 ? 'selected' : ''; ?>>Other</option>
			<?php else: ?>
				<option value="0">1v1</option>
				<option value="1">2v2</option>
				<option value="2">3v3</option>
				<option value="3">4v4</option>
				<option value="4">5v5</option>
				<option value="5">Other</option>
			<?php endif; ?>
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
			<div class="input-append date" data-date="<?php echo isset($data) ? date('Y-m-d', strtotime($data['date'])) : date('Y-m-d'); ?>" data-date-format="yyyy-mm-dd">
				<input type="text" name="date" value="<?php echo isset($data) ? date('Y-m-d', strtotime($data['date'])) : date('Y-m-d'); ?>" />
				<span class="add-on"><i class="icon-calendar"></i></span>
			</div> <input type="text" class="span2" name="time" value="<?php echo isset($data) ? date('H:i', strtotime($data['date'])) : date('H:i'); ?>" />

			<label>Status</label>
			<select class="js_select" name="status">
			<?php if(isset($data)): ?>
				<option value="0" <?php echo $data['status'] == 0 ? 'selected' : ''; ?>>Played</option>
				<option value="1" <?php echo $data['status'] == 1 ? 'selected' : ''; ?>>Upcoming</option>
				<option value="2" <?php echo $data['status'] == 2 ? 'selected' : ''; ?>>Delayed</option>
				<option value="3" <?php echo $data['status'] == 3 ? 'selected' : ''; ?>>Cancelled</option>
			<?php else: ?>
				<option value="0">Played</option>
				<option value="1">Upcoming</option>
				<option value="2">Delayed</option>
				<option value="3">Cancelled</option>
			<?php endif; ?>
			</select>

			<label>Matchlink</label>
			<div class="input-append">
				<input type="text" name="matchlink" value="<?php echo isset($data) ? $data['matchlink'] : set_value("matchlink"); ?>" />
				<span class="add-on js_tooltip" data-title="Dotabuff - dota:matchID"><i class="icon-info-sign"></i></span>
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
				<?php if(isset($scores)): ?>
				<?php $i=1; foreach($scores as $score): ?>
				<p class="row-fluid">
					<input class="input-small span2" type="text" name="opponentscore[]" value="<?php echo $score->opponent; ?>" />
					<input class="input-small span2" type="text" name="teamscore[]" value="<?php echo $score->team; ?>" />
					<?php if($i == 1): ?>
					<a id="admin-scores-add" class="btn btn-dark" href="#"><i class="icon-plus"></i></a>
					<?php else: ?>
					<a href="#" class="admin-scores-remove btn btn-dark"><i class="icon-minus"></i></a>
					<?php endif; ?>
				</p>
				<?php $i++; endforeach; ?>
				<?php else: ?>
				<p class="row-fluid">
					<input class="input-small span2" type="text" name="opponentscore[]" placeholder="Opponent score #1" />
					<input class="input-small span2" type="text" name="teamscore[]" placeholder="Team score #1" />
					<a id="admin-scores-add" class="btn btn-dark" href="#"><i class="icon-plus"></i></a>
				</p>
				<?php endif; ?>
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
					<?php if(isset($screenshots)): ?>
					<?php $i=1; foreach($screenshots as $screenshot): ?>
					<?php $meta = $this->matches_m->get_screenshot_meta($screenshot->file); ?>
					<li><img src="<?php echo base_url(); ?>uploads/screenshots/<?php echo $screenshot->file; ?>" alt="Screen" /><br /><a href="#" onclick="deleteScreenshot(<?php echo $meta[0]; ?>, <?php echo $meta[1]; ?>);">DELETE</a></li>
					<?php $i++; endforeach; ?>
					<?php endif; ?>
					<li class="addscreenshot"><i class="icon-plus icon-2x"></i></li>
				</ul>
			</div>
		</div>
	</div>

	<hr />

    <label>Match report</label>
    <textarea name="report" style="width: 98%;" rows="7"><?php echo isset($data) ? $data['report'] : set_value("report"); ?></textarea>

    <hr />

    <?php echo form_submit(array('name' => 'save', 'value' => 'Save match', 'class' => 'btn btn-dark')); ?>
<?php echo form_close(); ?>