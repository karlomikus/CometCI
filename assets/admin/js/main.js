$(document).ready(function() {
// Table action list -----------------------------------
	$(".tbl-custom tr").hover(function() {
		$(this).find(".action-icon").toggleClass("action-icon-active");
		$(this).find(".action-list").toggle();
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
	function formatGame(game) {
		var originalOption = game.element;
		return "<img src='"+baseUrl+"assets/games/" + $(originalOption).data('icon') + "' /> " + game.text;
	}
	$(".js_select_game").select2({
		width: 'off',
		formatResult: formatGame,
		formatSelection: formatGame,
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

	$('#admin-scores-add').live('click', function() { //Add
		var inputhtml = '<p><input placeholder="Opponent score #'+i+'" class="reset-input" type="text" name="opponentscore[]" /> <input placeholder="Team score #'+i+'" class="reset-input" type="text" name="teamscore[]" /> <a href="#" class="admin-scores-remove btn btn-cms-orange"><i class="icon-minus"></i></a></p>';
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

// Show ajax loader -----------------------------------
	$(".ajax-load").ajaxStart(function () {
		$(this).show();
	});
	$(".ajax-load").ajaxStop(function () {
		$(this).hide();
	});

// Match populate team input -----------------------------------
	var team_id;
	$(".teamdropdown").on("change", function (e) { 
		team_id = $(".teamdropdown").select2("data").id; 
		$.ajax({
			url: 'http://localhost/cms/admin/matches/fetch_team_members',
			type:'POST',
			data: "id="+team_id,
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

// Fix hidden file input ----------------------------------- [DEPRACTED]
	$(".addscreenshot").click(function() {
		$("#screenshotsfile").click();
	});
	$(".show-file-input").click(function() {
		$("#file-input").click();
	});

// Custom file input
	$(".show-file-input").click(function() {
		var selectedFile = $(this).attr('href');
		$(selectedFile).click();
		$(selectedFile).bind("change", handleImageFile);
	});

// Process file reader -----------------------------------
	$("#screenshotsfile").bind("change", handleImageFile);
	$("#file-input").bind("change", handleImageFile);

}); // End of jQuery document load

String.prototype.trunc = 
function(n){
	return this.substr(0,n-1)+(this.length>n?'&hellip;':'');
};

function bytesToSize(bytes, precision) {  
    var kilobyte = 1024;
    var megabyte = kilobyte * 1024;
    var gigabyte = megabyte * 1024;
    var terabyte = gigabyte * 1024;

    if ((bytes >= 0) && (bytes < kilobyte)) {
        return bytes + ' B';
    } else if ((bytes >= kilobyte) && (bytes < megabyte)) {
        return (bytes / kilobyte).toFixed(precision) + ' KB';
    } else if ((bytes >= megabyte) && (bytes < gigabyte)) {
        return (bytes / megabyte).toFixed(precision) + ' MB';
    } else if ((bytes >= gigabyte) && (bytes < terabyte)) {
        return (bytes / gigabyte).toFixed(precision) + ' GB';
    } else if (bytes >= terabyte) {
        return (bytes / terabyte).toFixed(precision) + ' TB';
    } else {
        return bytes + ' B';
    }
}

function handleImageFile(evt) {
	var files = evt.target.files;
	for (var i = 0, f; f = files[i]; i++) {
		if (!f.type.match('image.*')) {
			continue;
		}
		var reader = new FileReader();
		reader.onload = (function(theFile) {
			return function(e) {
				$('.cms-upload p').html(escape(theFile.name).trunc(35) +" <span>"+bytesToSize(theFile.size, 0)+"</span>");
				$('#screenshots ul').prepend('<li><a href="#"><img src="'+e.target.result+'" alt="" /></a></li>');
			};
		})(f);
		reader.readAsDataURL(f);
	}
}