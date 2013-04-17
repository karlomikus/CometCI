$(document).ready(function() {
	// Table action list
	$(".action-icon").click(function() {
		var list = $(this).next();
		$(this).toggleClass("action-icon-active");
		list.toggle();
	});

	// Sidebar tabs
	$('.sidebar-icon a').click(function (e) {
		e.preventDefault();
		$(this).tab('show');
	});

	// Select 2 plugin
	$(".js_select").select2({
		width: 'off'
	});
});