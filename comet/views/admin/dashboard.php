<script src="<?php echo base_url(); ?>assets/admin/js/raphael-min.js"></script>
<script src="http://cdn.oesmith.co.uk/morris-0.4.3.min.js"></script>
<script src="<?php echo base_url(); ?>assets/admin/js/jquery.sparkline.min.js"></script>

<?php if($installer): ?>
	<div class="alert alert-error">
		Install folder exists and it presents a security risk, please delete "_install/" folder in root of website!
	</div>
<?php endif; ?>

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
				<?php if(!empty($matches)): ?>
				<?php foreach ($matches as $match): ?>
				<li>
					<img src="<?php echo base_url(); ?>/uploads/opponents/<?php echo get_logo($match->opponent, 'opponent'); ?>" alt="" style="width: 50px; height: 50px;" />
					<p>
						<a href="<?php echo base_url(); ?>matches/show/<?php echo $match->id; ?>" target="_blank"><?php echo get_opponent_name($match->opponent); ?></a> <br />
						<span><?php echo cms_time($match->date); ?> - <?php echo !empty(get_event_data($match->event)->name) ? get_event_data($match->event)->name : 'Scrim'; ?></span>
					</p>
				</li>
				<?php endforeach; ?>
				<?php else: ?>
				<li>No matches today.</li>
				<?php endif; ?>
			</ul>

			<ul id="events-tab" class="match-list tab-pane fade in">
				<?php if(!empty($events)): ?>
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
				<?php else: ?>
					<li>No events today.</li>
				<?php endif; ?>
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
					<?php echo $commentstats; ?>
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
					<?php echo $postsstats; ?>
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
					<?php echo $topicsstats; ?>
				</span>
			</div>
		</div>
		<div class="row-fluid mini-stats">
			<div class="span7">
				<h4><?php echo $countusers; ?></h4>
				<small>Total users</small>
			</div>
			<div class="span4">
				<span class="inlinesparkline">
					<?php echo $userstats; ?>
				</span>
			</div>
		</div>
	</div>
	<div class="span4 cms-box admin-notes">
		<?php foreach ($notes as $note): ?>
			<p id="<?php echo $note->id; ?>">
				<?php echo $note->content; ?>
				<br />
				<small>added by: <?php echo get_username($note->author, false); ?> &dash; <a href="#">remove</a></small>
			</p>
		<?php endforeach; ?>
		<br>
		<?php echo form_open(uri_string(), array('class' => 'cms-form', 'id' => 'note-form')); ?>
			<textarea placeholder="Write a note..." name="notecontent" class="input-block-level"></textarea>
			<button id="addNote" type="submit" class="btn btn-cms-orange">post</button> <div class="ajax-load-white"><img src="<?php echo base_url() ?>assets/admin/img/loadingwhite.gif" alt="Loading..." /></div>
		<?php echo form_close(); ?>
	</div>
	<div class="span4 cms-box rss-news-feed">
		<article>
			<h4><a href="http://comet.kami-design.com/" target="_blank">Open Alpha v0.3a Released</a></h4>
			<p>Clan Comet has finally released alpha version. It's still not recommended for production use but you can test it locally or on web server...</p>
		</article>
	</div>
</div>

<script>
$(document).ready(function() {
// Admin ajax notes -----------------------------------
	$('#note-form').submit(function(e){
		e.preventDefault();
		var values = $(this).serialize();

		$("#addNote").attr("disabled", true);

		$.ajax({
			url: baseUrl + 'admin/notes/insertnote',
			type: 'post',
			data: values,
			dataType: 'json',
			success: function(data){
				$('<p id="'+ data.id +'">' + data.content + '<br /><small>added by: '+ data.author +' &dash; <a href="#">remove</a></small></p>').prependTo('.admin-notes').hide().slideDown();
				$('#note-form > textarea').val('');
				$("#addNote").attr("disabled", false);
			},
			error: function(){
				alert("Unable to submit note, make sure that note is not empty or try again later.");
				$("#addNote").attr("disabled", false);
			}
		});
	});

	$('.admin-notes').on('click', 'a', function(e){
		e.preventDefault();
		var noteID = $(this).parent().parent().attr('id');

		$.ajax({
			url: baseUrl + 'admin/notes/removenote/'+noteID,
			success: function(data){
				var selector = '.admin-notes #'+noteID;
				$(selector).slideUp(500, function() {
				    $(this).remove();
				});
			},
			error: function(){
				alert("Unable to submit note, make sure that note is not empty or try again later.");
			}
		});
	});

// Small graphs -----------------------------------
	$('.inlinesparkline').sparkline('html',{
	    type: 'line',
	    width: '100%',
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

// Visits graph -----------------------------------
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
});
</script>