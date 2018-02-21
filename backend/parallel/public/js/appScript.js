$(document).ready(function(){
	// initialization
	$('.modal').modal();
	$('select').material_select();
	$(".button-collapse").sideNav();

	$('#admission_number').focusout(function(){
		var _self=this;

		if($(this).val() == '') return 

		var school_id = $('#admission_school_id').html();
		var url = '/api/admission/'+$(this).val()+'/'+school_id;

		sendAPI('GET', url).then(function(response){
			if(response.data.length > 0 ){
				// no admission in database
				$(_self).removeClass('valid').addClass('invalid');
				showToast('Admission number exists in database');
			}else{

			}
		});
	});

	$('select#admission_section_id').change(function(){
		console.log('section change');

		// get api
		var url ='/api/section/'+$(this).val();
		sendAPI('GET', url).then(function(response){
			var data = response.data[0];


			$('.section-teacher').html(data.firstname+ ' ' +data.lastname);
			$('.section-time').html(timeFormat(data.timefrom)+ ' - ' +timeFormat(data.timeto));
			$('.new-admission-section-details').show();
		});

	});

	$('select#admission_class_id').change(function(){
		// get api
		var url ='/api/class/'+$(this).val()+'/sections';
		sendAPI('GET', url).then(function(response){

			// remove section content
			$('#admission_section_id option').remove();
			$('#admission_section_id').append('<option value="" disabled selected>select section</option>');
			$('.new-admission-section-details').hide();

			// populate
			$.each(response.data, function(key,val){
				$('#admission_section_id').append('<option value="'+val.id+'">'+val.name+'</option>');
			});

			$('select').material_select();
		});
	});

	$('select#access_id').change(function(){
		if($(this).val() != 0){
			$('#school_id_wrapper').show();
		}else{
			$('#school_id_wrapper').hide();
		}
	});

	$('.data-row').hover(function(){
		$(this).find('.data-edit-btn').show();
	});

	$('.data-row').mouseleave(function(){
		$(this).find('.data-edit-btn').hide();
	});

});


function timeFormat(timeString){
	var H = +timeString.substr(0, 2);
	var h = H % 12 || 12;
	var ampm = (H < 12 || H === 24) ? "AM" : "PM";
	timeString = h + timeString.substr(2, 3) + ampm;

	return timeString;
}


function showToast(message){
	Materialize.toast(message, 2000);
}
function validateForm(form){
	console.log(form.attr('id'));
}

function sendForm(form, url){
	var data = $('#'+form).serializeArray();

	console.log(data);

	sendAPI('POST', url, data).then(function(response){
		if($('.error-data').html() != ''){
			$('.error-data').html('');
			$('.error-message').html('');
		}

		showToast('user has been saved');

		setTimeout(function(){
			window.location.href="/users";
		}, 1000);
		
	})
	.catch(function(error){
		
		var err = JSON.parse(error.responseText);

		$('.error-message').html(err.message);
		$('.error-data').html('');
		$.each(err.errors, function(key, val){
			console.log(val);
			$('.error-data').append('<li>'+val+'</li>');
		});
	});
}


function showDetails(page,id){
	window.location.href = '/'+page+'/'+id;
}

function editDetails(page, id){
	window.location.href = '/'+page+'/edit/'+id;
}

function updateDetails(page, form){
	var data = $('#'+form).serialize();
	

	sendAPI('POST', page, data).then(function(response){
		if($('.error-data').html() != ''){
			$('.error-data').html('');
			$('.error-message').html('');
		}

		showToast('user has been updated');

		setTimeout(function(){
			window.location.href="/users";
		}, 1000);
	}).catch(function(error){
		var err = JSON.parse(error.responseText);

		$('.error-message').html(err.message);
		$('.error-data').html('');
		$.each(err.errors, function(key, val){
			console.log(val);
			$('.error-data').append('<li>'+val+'</li>');
		});

	});
}

function backbtnclick (){
	window.history.back();
}


function sendAPI(method,url,data){
	return(
		$.ajax({
			headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
	        url: url,
	        data: data,
	        datatype:'json',
	        // cache: false,
	        // processData: false,
	        type: method,
	        success: function (dat) {
	            // do something with the result
	            // console.log(dat);
	        }
	    })
	);
}