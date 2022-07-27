$(function() {
	$(document.body).on('change', 'input.preview-img', function() {
		let div = $(this).next('div.preview-box');
		div.removeClass('d-none');
		readURL(this, div);
	});

	function readURL(input, div) {
		if(input.files){
			var totalFiles = input.files.length;
			for (let i = 0; i < totalFiles; i++){
				if (input.files[i]) {
					let reader = new FileReader();
					reader.onload = function (e) {
						if(i == 0) {
							div.html('');
						}
						div.append('<img src="'+e.target.result+'" alt="Image not found!" class="img-thumbnail img-fluid">');
					}
					reader.readAsDataURL(input.files[i]);
				}
			}
		}
	}
});