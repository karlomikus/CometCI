<html>
	<head>
	<title>Upload Form</title>
	<link rel="stylesheet" href="http://ajax.googleapis.com/ajax/libs/jqueryui/1.8.9/themes/base/jquery-ui.css" id="theme">
	<link rel="stylesheet" href="<?php echo base_url(); ?>assets/uploader/css/jquery.fileupload-ui.css">
	<link rel="stylesheet" href="http://blueimp.github.com/cdn/css/bootstrap.min.css">
	<style>
	body {
		font-family: Verdana, Arial, sans-serif;
		font-size: 13px;
		margin: 0;
		padding: 20px;
	}
	</style>
	</head>
	<body>
		<?php echo $error; ?>
<div class="container">

	<form id="fileupload" action="http://localhost/cms/upload/do_upload" method="post" enctype="multipart/form-data">
		<!-- The fileupload-buttonbar contains buttons to add/delete files and start/cancel the upload -->
		<div class="row fileupload-buttonbar">
			<div class="span7">
				<!-- The fileinput-button span is used to style the file input field as button -->
				<span class="btn btn-success fileinput-button">
					<i class="icon-plus icon-white"></i>
					<span>Add files...</span>
					<input type="file" name="userfile" multiple>
				</span>
				<button type="submit" class="btn btn-primary start">
					<i class="icon-upload icon-white"></i>
					<span>Start upload</span>
				</button>
				<button type="reset" class="btn btn-warning cancel">
					<i class="icon-ban-circle icon-white"></i>
					<span>Cancel upload</span>
				</button>
				<button type="button" class="btn btn-danger delete">
					<i class="icon-trash icon-white"></i>
					<span>Delete</span>
				</button>
				<input type="checkbox" class="toggle">
			</div>
			<!-- The global progress information -->
			<div class="span5 fileupload-progress fade">
				<!-- The global progress bar -->
				<div class="progress progress-success progress-striped active" role="progressbar" aria-valuemin="0" aria-valuemax="100">
					<div class="bar" style="width:0%;"></div>
				</div>
				<!-- The extended global progress information -->
				<div class="progress-extended">&nbsp;</div>
			</div>
		</div>
		<!-- The loading indicator is shown during file processing -->
		<div class="fileupload-loading"></div>
		<br>
		<!-- The table listing the files available for upload/download -->
		<table role="presentation" class="table table-striped"><tbody class="files" data-toggle="modal-gallery" data-target="#modal-gallery"></tbody></table>
	</form>
</div>
<!-- modal-gallery is the modal dialog used for the image gallery -->
<div id="modal-gallery" class="modal modal-gallery hide fade" data-filter=":odd" tabindex="-1">
	<div class="modal-header">
		<a class="close" data-dismiss="modal">&times;</a>
		<h3 class="modal-title"></h3>
	</div>
	<div class="modal-body"><div class="modal-image"></div></div>
	<div class="modal-footer">
		<a class="btn modal-download" target="_blank">
			<i class="icon-download"></i>
			<span>Download</span>
		</a>
		<a class="btn btn-success modal-play modal-slideshow" data-slideshow="5000">
			<i class="icon-play icon-white"></i>
			<span>Slideshow</span>
		</a>
		<a class="btn btn-info modal-prev">
			<i class="icon-arrow-left icon-white"></i>
			<span>Previous</span>
		</a>
		<a class="btn btn-primary modal-next">
			<span>Next</span>
			<i class="icon-arrow-right icon-white"></i>
		</a>
	</div>
</div>
<!-- The template to display files available for upload -->
<script id="template-upload" type="text/x-tmpl">
{% for (var i=0, file; file=o.files[i]; i++) { %}
	<tr class="template-upload fade">
		<td class="preview"><span class="fade"></span></td>
		<td class="name"><span>{%=file.name%}</span></td>
		<td class="size"><span>{%=o.formatFileSize(file.size)%}</span></td>
		{% if (file.error) { %}
			<td class="error" colspan="2"><span class="label label-important">Error</span> {%=file.error%}</td>
		{% } else if (o.files.valid && !i) { %}
			<td>
				<div class="progress progress-success progress-striped active" role="progressbar" aria-valuemin="0" aria-valuemax="100" aria-valuenow="0"><div class="bar" style="width:0%;"></div></div>
			</td>
			<td>{% if (!o.options.autoUpload) { %}
				<button class="btn btn-primary start">
					<i class="icon-upload icon-white"></i>
					<span>Start</span>
				</button>
			{% } %}</td>
		{% } else { %}
			<td colspan="2"></td>
		{% } %}
		<td>{% if (!i) { %}
			<button class="btn btn-warning cancel">
				<i class="icon-ban-circle icon-white"></i>
				<span>Cancel</span>
			</button>
		{% } %}</td>
	</tr>
{% } %}
</script>
<!-- The template to display files available for download -->
<script id="template-download" type="text/x-tmpl">
{% for (var i=0, file; file=o.files[i]; i++) { %}
	<tr class="template-download fade">
		{% if (file.error) { %}
			<td></td>
			<td class="name"><span>{%=file.name%}</span></td>
			<td class="size"><span>{%=o.formatFileSize(file.size)%}</span></td>
			<td class="error" colspan="2"><span class="label label-important">Error</span> {%=file.error%}</td>
		{% } else { %}
			<td class="preview">{% if (file.thumbnail_url) { %}
				<a href="{%=file.url%}" title="{%=file.name%}" data-gallery="gallery" download="{%=file.name%}"><img src="{%=file.thumbnail_url%}"></a>
			{% } %}</td>
			<td class="name">
				<a href="{%=file.url%}" title="{%=file.name%}" data-gallery="{%=file.thumbnail_url&&'gallery'%}" download="{%=file.name%}">{%=file.name%}</a>
			</td>
			<td class="size"><span>{%=o.formatFileSize(file.size)%}</span></td>
			<td colspan="2"></td>
		{% } %}
		<td>
			<button class="btn btn-danger delete" data-type="{%=file.delete_type%}" data-url="{%=file.delete_url%}"{% if (file.delete_with_credentials) { %} data-xhr-fields='{"withCredentials":true}'{% } %}>
				<i class="icon-trash icon-white"></i>
				<span>Delete</span>
			</button>
			<input type="checkbox" name="delete" value="1" class="toggle">
		</td>
	</tr>
{% } %}
</script>

<script src="//ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
<script src="<?php echo base_url(); ?>assets/uploader/js/vendor/jquery.ui.widget.js"></script>
<script src="http://blueimp.github.com/JavaScript-Templates/tmpl.min.js"></script>
<script src="http://blueimp.github.com/JavaScript-Load-Image/load-image.min.js"></script>
<script src="http://blueimp.github.com/JavaScript-Canvas-to-Blob/canvas-to-blob.min.js"></script>
<script src="http://blueimp.github.com/cdn/js/bootstrap.min.js"></script>
<script src="http://blueimp.github.com/Bootstrap-Image-Gallery/js/bootstrap-image-gallery.min.js"></script>
<script src="<?php echo base_url(); ?>assets/uploader/js/jquery.iframe-transport.js"></script>
<script src="<?php echo base_url(); ?>assets/uploader/js/jquery.fileupload.js"></script>
<script src="<?php echo base_url(); ?>assets/uploader/js/jquery.fileupload-fp.js"></script>
<script src="<?php echo base_url(); ?>assets/uploader/js/jquery.fileupload-ui.js"></script>


<script type="text/javascript">
$(function () {
	$('#fileupload').fileupload();

	$.ajax({
		url: $('#fileupload').fileupload('option', 'url'),
		dataType: 'json',
		context: $('#fileupload')[0]
	}).done(function (result) {
		$(this).fileupload('option', 'done').call(this, null, {result: result});
	});

});
</script>		 
</body>
</html>

<!DOCTYPE HTML>
<html>
<head>
<meta charset="utf-8">
<title>jQuery File Upload Example</title>
</head>
<body>
<form id="fileupload" action="http://localhost/cms/upload/do_upload" method="post" enctype="multipart/form-data">
	<input id="fileupload" type="file" name="userfile" multiple>
	<button type="submit" class="btn btn-primary start">
</form>
<script src="//ajax.googleapis.com/ajax/libs/jquery/1.8.3/jquery.min.js"></script>
<script src="js/vendor/jquery.ui.widget.js"></script>
<script src="<?php echo base_url(); ?>assets/uploader/js/jquery.iframe-transport.js"></script>
<script src="<?php echo base_url(); ?>assets/uploader/js/jquery.fileupload.js"></script>
<script>
$(function () {
    $('#fileupload').fileupload({
        dataType: 'json',
        done: function (e, data) {
            $.each(data.result.files, function (index, file) {
                $('<p/>').text(file.name).appendTo(document.body);
            });
        }
    });
});
</script>
</body> 
</html>