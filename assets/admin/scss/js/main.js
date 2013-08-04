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

// Show ajax loader -----------------------------------
	$(".ajax-load, .ajax-load-white").ajaxStart(function () {
		$(this).show();
	});
	$(".ajax-load, .ajax-load-white").ajaxStop(function () {
		$(this).hide();
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
	if($.fn.pickadate) {
		$('.datepicker').pickadate({
			format: 'yyyy-mm-dd'
		});
	}
	if($.fn.pickadate) {
		$('.timepicker').pickatime({
			format: 'HH:i',
			interval: 10
		});
	}

}); // End of jQuery document load

String.prototype.trunc = 
function(n) {
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