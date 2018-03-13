function loadContent(url,pagefrom){

	// append loader
	app.main_content.html('<div style="width: 100%" class="center-align">'+loader()+'</div>');

	sendAPI('GET', url).then(function(response){

		app.main_content.html(response);

		Materialize.fadeInImage('#app-main');

		// page title
		updatePageTitle(url);

		pushPageStack(url);

		//get and update system info
		if($('#nav_main')) getUserInfo();

		//update nav controller
		// navigation links
		// getNavCrumbs parameter on link in crumbs : true or false
		// getNavCrumbs();

		// initialize page init for jquery and other function
		if(pagefrom != 'index') init();

		initialize();
		formInit();
		tableInit();
	})
	.catch(function(error){

		if(error){ 
			app.main_content.html(errorMsg());
		}

	});
}

function login(){

	$('.login-btn').html('<div style="padding: 2px">'+loader()+"</div>");
	setTimeout(function(){
		$('#login').click();
		$('.login-btn').html('Login');
	},1000)
	
}

function search(){

	var key=$('#search').val();

	if(key.length > 1){

		// show loader
		$('.result-container').html('<div style="width: 100%" class="center">'+loader('searching database...'+'</div>'));

		// setTimeout(function(){
			sendAPI('GET', '/system/search/'+key).then(function(response){

				$('.result-container').html(response);

				$('.search-key').html(key);

				$('#search_modal .collection-item').click(function(){
					$('#search_modal .close').click();
				});

			}).catch(function(error){

				errorMsg();

			});
		// }, 1000);

	}else{
		clearSearchContent();
	}
}

function systemSettingsSave(type){
	var attr = systemEditAttribute(type);
	var data = $('#system_'+type+' form').serialize();

	sendAPI('POST',attr.saveUrl, data).then(function(response){

		showToast(response.message);
		$('.system-modal').modal('close');

		// refresh page if changing theme
		if(type == 'theme') {
			setTimeout( function(){showToast(language.themechangeprompt);}, 500);

			setTimeout( function(){showToast(language.reloadingpage)}, 1000);

			setTimeout(function(){
				window.location.reload();
			}, 1500);
			
		};

	}).catch(function(error){

		var err = JSON.parse(error.responseText);

		$('.error-message').html(err.message);
		$('.error-data').html('');

		$.each(err.errors, function(key, val){

			$('.error-data').append('<li>'+val+'</li>');

		});

	});
}

function systemSettingsEdit(type){
	openSystemEditModal(type);
}

function saveEdit(){
	var form = $('#edit_modal').find('form').attr('id');
	var url = $('#'+form).attr('sendform-url');

	sendForm(form, url, 'users').then(function(response){
		console.log(response);
	})
	.catch(function(error){
		errorMsg(lang.somethingwentwrong);
	});
}

function updatePageTitle(url){
	$('#page_title').html(getPageTitle(url));
}

function updateUrlBar(url){
	window.history.pushState("object or string", "Title", url);
}

function editDetails(page, id){
	// window.location.href = '/'+page+'/edit/'+id;
	url = '/'+page+'/edit/'+id;
	loadContent(url);
}

function formInit(){
	Materialize.updateTextFields();
	$('select').material_select();
	$('.datepicker').pickadate({
	    selectMonths: true, // Creates a dropdown to control month
	    selectYears: 100, // Creates a dropdown of 15 years to control year,
	    today: 'Today',
	    clear: 'Clear',
	    close: 'Ok',
	    closeOnSelect: true, // Close upon selecting a date,
	    format: 'mmm dd, yyyy'
	  });

	$('.timepicker').pickatime({
	    default: 'now', // Set default time: 'now', '1:30AM', '16:30'
	    fromnow: 0,       // set default time to * milliseconds from now (using with default = 'now')
	    twelvehour: true, // Use AM/PM or 24-hour format
	    donetext: 'OK', // text for done-button
	    cleartext: 'Clear', // text for clear-button
	    canceltext: 'Cancel', // Text for cancel-button
	    autoclose: false, // automatic close timepicker
	    ampmclickable: true, // make AM PM clickable
	    aftershow: function(){} //Function for after opening timepicker
	  });
}

function tableInit(){
	$('.data-row').hover(function(){
		$(this).find('.data-edit-btn').show();
	});

	$('.data-row').mouseleave(function(){
		$(this).find('.data-edit-btn').hide();
	});
}

function initialize(){
	$('.modal').modal();
	$('.slider').slider();
	$('ul.tabs').tabs({
		swipeable: true,
	});
	$('.materialboxed').materialbox();
	$('.tooltipped').tooltip({delay: 50});
	$(".button-collapse").sideNav({
		edge: 'right'
	});

	

	
}

function showDetails(page,id){

	var url = '/s/'+page+'/'+id;
	loadContent(url, page);
}

$(document).ready(function(){

	clock('system-clock');
	// initialization
	initialize();

	$('#system_user').click(function(){
		// console.log('systemuser')
		// $('.button-collapse').sideNav('show');
	});

	$('.logout').click(function(){

		$(this).html(loader(' processing log out...'));
		setTimeout(function(){ window.location.href = '/logout'; }, 1000);
		 
	});

	$('.sidenav .nav').click(function(){
		var url = $(this).attr('url');
		loadContent(url);
	});

	$('.sub-nav .tab').click(function(){ navClick($(this)); });


});

function admissionFormSubmit(form, url){

	if($('#admission_number').hasClass('invalid')){
		showToast(language.admissionnumexist);
	}else if ($('#admission_student_id').hasClass('invalid')){
		showToast(language.studentnumexist);
	}else{
		sendForm(form,url,'admission');
	}
}

function updateDetails(page, form){

	var data = $('#'+form).serialize();
	
	sendAPI('POST', page, data).then(function(response){
		if($('.error-data').html() != ''){
			$('.error-data').html('');
			$('.error-message').html('');
		}

		showToast('user has been updated');

		setTimeout(function(){ window.location.href="/users"; }, 1000);

	}).catch(function(error){

		var err = JSON.parse(error.responseText);

		$('.error-message').html(err.message);
		$('.error-data').html('');

		$.each(err.errors, function(key, val){

			$('.error-data').append('<li>'+val+'</li>');

		});

	});
}

function backbtnclick (){

	window.history.back();

}



