/*
load default content in each page
*/
loadIndex();

function init(){

	$('#image_upload').change(function(){
		var fileInput = $(this);
		console.log(fileInput);
		var url = '/api'+fileInput.attr('api');
		var form = fileInput.attr('fdata');

		var container = fileInput.attr('container');
		var formInput = fileInput.attr('form-input');

		var data = new FormData($('#'+form)[0]);

		console.log(data);

		uploadTempImg(url, data).then(function(response){
			// append to container
			$('#'+container).css({'background':'url("/'+response+'")'});
			// add url to logo input
			$('#'+formInput).val(response);

		}).catch(function(error){
			errorMsg('something went wrong');
		});

	});


	$('.add-image-container').click(function(){
		var input = $('#'+$(this).attr('activates'));

		input.click();
	});
}

