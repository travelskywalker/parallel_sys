loadIndex();

function init(){

	$('select').material_select();
	
	$(".button-collapse").sideNav();

	image_upload_init();

	$('#admission_number').focusout(function(){
		var _self=this;

		if($(this).val() == '') return 

		var url = '/api/admission/'+$(this).val()+'/'+$('select#admission_school_id').val();

		sendAPI('GET', url).then(function(response){

			console.log(response);
			if(response.data.length > 0 ){
				// no admission in database
				$(_self).removeClass('valid').addClass('invalid');
				showToast(language.admissionnumexist);
			}else{

			}
		});
	});


	$('#admission_student_id').focusout(function(){
		var _self=this;

		if($(this).val() == '') return 

		var url = '/api/student/'+$(this).val()+'/'+$('select#admission_school_id').val();

		sendAPI('GET', url).then(function(response){

			console.log(response);
			if(response.data.length > 0 ){
				// no admission in database
				$(_self).removeClass('valid').addClass('invalid');
				showToast(language.studentnumexist);
			}else{

			}
		});
	});

	$('select#admission_type').change(function(){

		if($(this).val() == 'old'){
			$('.search-student').show();
			$('#search_student').focus();

			disableAdmissionBtn();
			// showAdmissionForm('old');
		}else{
			$('.search-student').hide();
			showAdmissionForm();
		}

	});

	$('#search_student').keyup(function(){
		var key = $(this).val();
		var school_id = $('select#admission_school_id').val();
		var url = '/school/'+school_id+'/student/search/'+key;

		if(key.length >=2){
			sendAPI('GET', url).then(function(response){
				$('.search-student-result').html(response);
				
			});
		}else{
			$('.search-student-result').html('');
		}
	});

	$('select#admission_section_id').change(function(){

		// get api
		var url ='/api/section/'+$(this).val();
		sendAPI('GET', url).then(function(response){
			var data = response.data[0];

			if(data.firstname != null || data.lastname != null) $('.section-teacher').html(data.firstname+ ' ' +data.lastname);
			$('.section-time').html(timeFormat(data.timefrom)+ ' - ' +timeFormat(data.timeto));

			$('.new-admission-section-details').show();
		});

	});

	$('select#admission_class_id').change(function(){
		// get api
		var url ='/api/class/'+$(this).val()+'/sections';
		sendAPI('GET', url).then(function(response){

			// remove section content
			clearSectionData();

			// populate
			$.each(response.data, function(key,val){
				$('#admission_section_id').append('<option value="'+val.id+'">'+val.name+'</option>');
			});

			$('select').material_select();
		});
	});

	$('select#admission_school_id').change(function(){
		var _self = this;

		var id = parseInt($(this).val());

		// get api
		var url ='/api/school/'+id+'/classes';

		sendAPI('GET', url).then(function(response){

			if(response.data.length == 0){

				$('.error-message').html('No Class available. Please create class and section first to make admission');

				errorMsg('No Class available. Please create class and section first to make admission');

				$('select#admission_class_id').addClass('invalid');
				$('#admission_class_id option').remove();
				$('#admission_class_id').append('<option value="" disabled selected>no class available</option>');
			}else{
			
				// remove class content
				clearClassData();
				clearSectionData();

				if($('select#admission_class_id').hasClass('invalid')){
					$('select#admission_class_id').removeClass('invalid');
				}

				// populate
				$.each(response.data, function(key,val){
					$('#admission_class_id').append('<option value="'+val.id+'">'+val.name+'</option>');
				});

				$('select').material_select();
			}

			//clear admission number if existing
			$('#admission_number').val('');
			if($('#admission_number').hasClass('invalid')){
				$('#admission_number').removeClass('invalid');
			}


		}).catch(function(error){
			showToast(error);
		});
	});

	$('select#access_id').change(function(){
		if($(this).val() != 0){
			$('#school_id_wrapper').show();
		}else{
			$('#school_id_wrapper').hide();
		}
	});
}

function populateAdmissionData(id){
	showAdmissionForm('old', id);
}

function showAdmissionForm(type = 'new', id=0){

	url = '/admission/form/'+type+'/'+id;

	sendAPI('GET', url).then(function(response){
		$('.admission-form').html(response);
		clearSearchStudent();

		formInit();
		enableAdmissionBtn();
	});
	
}

function clearSectionData(){
	$('#admission_section_id option').remove();
	$('#admission_section_id').append('<option value="" disabled selected>select section</option>');
	$('.new-admission-section-details').hide();
}

function clearClassData(){
	$('#admission_class_id option').remove();
	$('#admission_class_id').append('<option value="" disabled selected>select class</option>');
}

function clearError(){
	$('.error-message').html('');
}

function clearSearchStudent(){
	$('#search_student').val('');
	$('.search-student-result').html('');

}

function disableAdmissionBtn(){
	$('.admission-btn').addClass('disabled');
}

function enableAdmissionBtn(){
	$('.admission-btn').removeClass('disabled');
}



// for tuts
// $('.tap-target').tapTarget('open');