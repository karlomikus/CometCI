//@prepros-append bootstrap.min.js
//@prepros-append select2.min.js
//@prepros-append bootbox.min.js
//@prepros-append jquery.icheck.min.js
//@prepros-append jquery.cookie.js

$(document).ready(function() {
// Table action list -----------------------------------
	$(".tbl-custom tr").hover(function() {
		$(this).find(".action-icon").toggleClass("action-icon-active");
		$(this).find(".action-list").toggle();
	});

// Tooltip -----------------------------------
	$('.js_tooltip').tooltip();

	$('#page-name').on('keyup', function()	{
		var slug = $(this).val().replace(/[^a-zA-Z0-9-]/g, '-').toLowerCase().replace(/--+/g, '-');
		$('#page-slug').val(slug);
	});

// Sidebar tabs -----------------------------------
	if($.cookie('activeTabGroup') == null) $.cookie('activeTabGroup', '#dashboard-tab', { expires: 7, path: '/' });
	$($.cookie('activeTabGroup')).addClass('active');

	$('.sidebar-icon a').click(function (e) {
		e.preventDefault();
		$(this).tab('show');
		$.cookie('activeTabGroup', $(this).attr('href'), { expires: 7, path: '/' });
	});

	$('#event-tabs a').click(function (e) {
		e.preventDefault();
		$(this).tab('show');
	});

// Select 2 plugin -----------------------------------
	$(".js_select").select2({
		width: 'off'
	});

	$(".js_select_no_search").select2({
		width: 'off',
		minimumResultsForSearch: -1
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

// Match - Scores -----------------------------------
	var scntDiv = $('#admin-scores');
	var i = $('#admin-scores p').size() + 1;

	$('#admin-scores-add').live('click', function() { //Add
		var inputhtml = '<p><input placeholder="Opponent score #'+i+'" class="reset-input input-large" type="text" name="opponentscore[]" /> <input placeholder="Team score #'+i+'" class="reset-input input-large" type="text" name="teamscore[]" /> <a href="#" class="admin-scores-remove btn btn-cms-orange"><i class="icon-minus"></i></a></p>';
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

// Calendar events -----------------------------------
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

// Layout manager -----------------------------------
	$("#layout-list").change(function(e) {
		var layout 	= $(this).val();
		$.ajax({
			url: baseUrl+'admin/layouts/fetch_layout',
			type: 'POST',
			data: {
				layout: layout,
				csrf_comet: cct
			},
			dataType: 'html',
			cache: false,
			success: function(output) {
				$('#layout-edit').val(output);
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

// Custom file input -----------------------------------
	var fileSender = '.cms-upload p';
	$(".show-file-input").click(function(e) {
		e.preventDefault();
		var selectedFile = $(this).attr('href');

		// For multiple instances of file upload input
		var senderID = $(this).parent().attr('id');
		if(senderID != null) fileSender = '#' + senderID + ' p';

		$(selectedFile).click();
		$(selectedFile).bind("change", handleImageFile);
	});

// Process file reader -----------------------------------
	$("#screenshotsfile").bind("change", handleImageFile);
	$("#file-input").bind("change", handleImageFile);

/**
 * Handles html image previews. Can display
 * image, file size, file name, etc...
 * Uses new FileReader class available only
 * on modern browsers
 * 
 * @param  {object} evt Event data
 * @return {void}
 */
function handleImageFile(evt) {
	var files = evt.target.files;
	for (var i = 0, f; f = files[i]; i++) {
		if (!f.type.match('image.*')) {
			continue;
		}
		var reader = new FileReader();
		reader.onload = (function(theFile) {
			return function(e) {
				$(fileSender).html(escape(theFile.name).trunc(35) +" <span>"+bytesToSize(theFile.size, 0)+"</span>");
				$('#screenshots ul').prepend('<li><a href="#"><img src="'+e.target.result+'" alt="" /></a></li>');
			};
		})(f);
		reader.readAsDataURL(f);
	}
}

// Confirm delete -----------------------------------
	$(".confirm-delete").click(function(e) {
		e.preventDefault(); // Prevent going to url after user clicks the link
		var deleteLink = $(this).attr("href"); // Get link

		bootbox.dialog("<i class=\"icon-exclamation-sign icon-4x\"></i><br />Are you sure you want to delete this data?", [{
			"label" : "OK",
			"class" : "btn-cms-orange",
			"callback": function() {
				window.location = deleteLink;
			}
			}, {
			"label" : "Cancel",
			"class" : "btn-cms",
			"callback": function() {
				bootbox.hideAll();
			}
		}]);
	});

// Input tooltips -----------------------------------
	$(".inputip").on({
	"keyup focus": function() {
	    if (this.value.length <= 3) {
	        if ($(".tooltip").length == 0) {
	            $(this).tooltip("show");
	        }
	    } else {
	        if ($(".tooltip").length != 0) {
	            $(this).tooltip("hide");
	        }
	    }
	},
	blur: function() {
	    $(this).tooltip("hide");
	}
	}).tooltip({
	placement: "right",
	trigger: "manual"
	});

// Custom checkboxes -----------------------------------
	$('input').iCheck({
		checkboxClass: 'icheckbox_square-blue',
		radioClass: 'iradio_square-blue',
		increaseArea: '20%' // optional
	});

// Date and time picker -----------------------------------
	$('.datepicker').pickadate({
		format: 'yyyy-mm-dd'
	});
	$('.timepicker').pickatime({
		format: 'HH:i',
		interval: 10
	});

}); // End of jQuery document load

/**
 * Ellipsize a string
 * 
 * @type {string}
 */
String.prototype.trunc = 
function(n) {
	return this.substr(0,n-1)+(this.length>n?'&hellip;':'');
};

/**
 * Transforms byte representation of file size into
 * human readable file size format
 * 
 * @param  {int} bytes     Size in bytes
 * @param  {int} precision Conversion precision
 * @return {string}
 */
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