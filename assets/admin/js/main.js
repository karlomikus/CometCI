$(document).ready(function() {
	// Table action list -----------------------------------
	$(".action-icon").click(function() {
		var list = $(this).next();
		$(this).toggleClass("action-icon-active");
		list.toggle();
	});

	// Tooltip -----------------------------------
	$('.js_tooltip').tooltip();

	// Sidebar tabs -----------------------------------
	$('.sidebar-icon a').click(function (e) {
		e.preventDefault();
		$(this).tab('show');
	});

	// Select 2 plugin -----------------------------------
	$(".js_select").select2({
		width: 'off'
	});

	// Select 2 Game icons -----------------------------------
	function format(game) {
		var originalOption = game.element;
		return "<img src='"+baseUrl+"assets/games/" + $(originalOption).data('icon') + "' /> " + game.text;
	}

	$(".js_select_game").select2({
		width: 'off',
		formatResult: format,
		formatSelection: format,
		escapeMarkup: function(m) { return m; }
	});

	// Cancel button -----------------------------------
	$('.goback').click(function(){
		history.back();
	});

	// Datepicker -----------------------------------
	$('.date').datepicker();

	// Match - Scores -----------------------------------
	var scntDiv = $('#admin-scores');
	var i = $('#admin-scores p').size() + 1;
	var inputhtml = '<p><input class="reset-input" type="text" name="opponentscore[]" /> <input class="reset-input" type="text" name="teamscore[]" /> <a href="#" class="admin-scores-remove btn btn-cms-orange"><i class="icon-minus"></i></a></p>';

	$('#admin-scores-add').live('click', function() { //Add
		$(inputhtml).appendTo(scntDiv);
		i++;
		return false;
	});
	$('.admin-scores-remove').live('click', function() { //Remove
		if( i > 2 ) {
			$(this).parents('p').remove();
			i--;
		}
		return false;
	});

	// Match populate team input -----------------------------------
	$(".ajax-load").ajaxStart(function () {
		$(this).show();
	});
	$(".ajax-load").ajaxStop(function () {
		$(this).hide();
	});

	var team_id;
	$(".team_select").on("change", function (e) { 
		team_id = $(".team_select").select2("data").id; 
		$.ajax({
			url: 'http://localhost/cms/admin/matches/fetch_team_members',
			type:'POST',
			data: "id="+team_id,
			dataType: 'html',
			success: function(output_string) {
				$('.teamplayers').append(output_string);
			}
		});
	});

	// Fix hidden file input -----------------------------------
	$(".addscreenshot").click(function() {
		$("#screenshotsfile").click();
	});

});

// Reads image file, used to get
// image thumbnail for screenshots page
function handleFileSelect(evt) {
	var files = evt.target.files;
	for (var i = 0, f; f = files[i]; i++) {
		if (!f.type.match('image.*')) {
			continue;
		}

		var reader = new FileReader();
		reader.onload = (function(theFile) {
			return function(e) {
				var span = document.createElement('span');
				span.innerHTML = ['<img class="thumb" src="', e.target.result,'" title="', escape(theFile.name), '"/><br/>', theFile.size].join('');
				$('#screenshots ul').prepend('<li><a href="#"><img src="'+e.target.result+'" alt="" /></a></li>');
			};
		})(f);
		reader.readAsDataURL(f);
	}
}

document.getElementById('screenshotsfile').addEventListener('change', handleFileSelect, false);