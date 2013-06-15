<!-- <div style="width: 200px; background: red;">
	<div id="prog_inner" style="width: 0; height: 20px; background: green;"></div>
</div> -->
<?php echo form_open_multipart(); ?>
	<input type="file" size="200" id="images" multiple />
	<div id="response"></div>
<?php echo form_close(); ?>

<ul id="image-list" class="gallery-list">
	
</ul>

<hr />

<h4>Existing images:</h4>

<ul class="gallery-list">
	<?php foreach($data as $image): ?>
		<li>
			<img src="<?php echo base_url("uploads/".$image->file) ?>" alt="Image" />
			<a href="#"><i class="icon-remove"></i></a>
		</li>
	<?php endforeach; ?>
</ul>


<script>
(function () {
	var input = document.getElementById("images"), 
		formdata = false;
		secureHash = $("input[name=csrf_comet]").val(); // Get CSRF token

	function showUploadedItem (source) {
  		var list = document.getElementById("image-list"),
	  		li   = document.createElement("li"),
	  		img  = document.createElement("img");
  		img.src = source;
  		li.appendChild(img);
		list.appendChild(li);
	}

	function progressHandlingFunction(e){
		// if(e.lengthComputable) {
		// 	var done = e.position || e.loaded, total = e.totalSize || e.total;
		// 	var percent = parseInt(e.loaded / e.total * 100, 10) + '%';
		// 	//parseInt(data.loaded / data.total * 100, 10);
		// 	$('#prog_inner').width(percent);
		// }
		
        //console.log('xhr.upload progress: ' + done + ' / ' + total + ' = ' + (Math.floor(done/total*1000)/10) + '%');
	}

	if (window.FormData) {
  		formdata = new FormData();
	}

 	input.addEventListener("change", function (evt) {
 		document.getElementById("response").innerHTML = "Uploading . . .";
 		var i = 0, len = this.files.length, img, reader, file;
	
		for ( ; i < len; i++ ) {
			file = this.files[i];
	
			if (!!file.type.match(/image.*/)) {
				if ( window.FileReader ) {
					reader = new FileReader();
					reader.onloadend = function (e) { 
						showUploadedItem(e.target.result, file.fileName);
					};
					reader.readAsDataURL(file);
				}
				if (formdata) {
					formdata.append("images[]", file);
					formdata.append("csrf_comet", secureHash);
				}
			}	
		}
	
		if (formdata) {
			$.ajax({
				url: baseUrl+"admin/gallery/upload",
				type: "POST",
				xhr: function() {  // custom xhr
					var myXhr = $.ajaxSettings.xhr();
					if(myXhr.upload){
						myXhr.upload.addEventListener('progress',progressHandlingFunction, false);
					}
					return myXhr;
				},
				data: formdata,
				processData: false,
				contentType: false,
				success: function (res) {
					document.getElementById("response").innerHTML = res;
					$('#images').val('');
				}
			});
		}
	}, false);
}());
</script>