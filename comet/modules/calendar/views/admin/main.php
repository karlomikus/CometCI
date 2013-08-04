<?php echo $calendar; ?>
<div id="event-list"></div>

<script type="text/javascript">
$(document).ready(function() {
	$(".cms-calendar td a").click(function(e) {
		e.preventDefault();
		var date = $(this).attr("href").substr(1);
		var hash = $.cookie('csrf_cookie_comet');
		$.ajax({
			url: baseUrl+'admin/calendar/fetch_event',
			type: 'POST',
			data: {
				date: date,
				csrf_comet: hash
			},
			dataType: 'html',
			cache: false,
			success: function(output) {
				$('#event-list').html(output);
			}
		});
	});
});
</script>