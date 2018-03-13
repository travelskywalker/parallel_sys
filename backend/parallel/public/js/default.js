function loader(message='default'){
	var loader = '<div class="preloader-wrapper small active">';
		loader += '<div class="spinner-layer spinner-red-only">';
		loader += '<div class="circle-clipper left">';
		loader += '<div class="circle"></div>';
		loader += '</div><div class="gap-patch">';
		loader += '<div class="circle"></div>';
		loader += '</div><div class="circle-clipper right">';
		loader += '<div class="circle"></div>';
		loader += '</div>';
		loader += '</div>';
		loader += '</div>';

		if(message!='default') loader += '<div> '+message+'</div>';

	return loader;
}

function systemModal(){

	var modal ='<div class="modal modal-fixed-footer system-modal">';
	modal += '<div class="modal-content">';
	modal +=  '<h4></h4>';
	modal +=  '<div class="modal-content-container">';
	modal +=  '</div>';
	modal +=  '</div>';
	modal +=   '<div class="modal-footer">';
	modal +=  '<a class="modal-action modal-close waves-effect waves-green btn-flat ">Cancel</a>';
	modal +=  '<a class="modal-action waves-effect waves-green btn-flat save-btn">Save</a>';
	modal +=  '</div>';
	modal +=  '</div>';

	return modal;
}

function loadIndex(){
	loadContent('/s'+app.path);
}

function openEditModal(url){
	$('#edit_modal').modal('open');

	$('.modal-content-container').html(loader());

	sendAPI('GET', url).then(function(response){
		$('.modal-content-container').html(response);
		formInit();
		init();
	})
	.catch(function(error){
		$('#edit_modal').modal('close');
		errorMsg(lang.somethingwentwrong);
	});
}

function opensearch(){
	// $('.search-page-modal').fadeIn('fast');
	// $('#search').focus();

	$('#search_modal').modal({
		ready:function(){
			$('#search').focus();
		},
		complete: function(){
			clearSearchContent();
			$('#search').val('');
		}
	}).modal('open');
}

function clearSearchContent(){
	$('#search_modal .result-container').html('');
	
}

function openSystemEditModal(type){

	$('body').append(systemModal());

		$('.system-modal').modal({
			ready: function(){
				var attr = systemEditAttribute(type);

				$('.system-modal').attr('id','system_'+type);
				$('.system-modal h4').html(attr.title);
				$('.system-modal .save-btn').attr('onclick','systemSettingsSave(\''+type+'\')');

				sendAPI('GET',attr.formUrl).then(function(response){

					// append to content
					$('.system-modal .modal-content-container').append(response);

					// initialize form
					formInit();

				}).catch(function(error){
					errorMsg();
					console.log(error);
				});
			},
			complete: function(){
				$('.system-modal').remove();
			}
		}).modal('open');
}

function systemEditAttribute(type){

	var attribute = {};

	if(type == 'theme'){
		attribute = {
			'title':'Choose Theme',
			'formUrl':'/user/system/themeeditform',
			'saveUrl':'/user/system/savetheme'
		}
	}else if(type == 'changePassword'){
		attribute = {
			'title':'Change Password',
			'formUrl':'/user/changepasswordform',
			'saveUrl':'/user/changepassword'
		}
	}else if(type == 'widget'){
		attribute = {
			'title':'Edit widget',
			'formUrl':'/user/system/widgeteditform',
			'saveUrl':'/user/system/savewidget'
		}
	}

	return attribute;
}

function compareTime(from,to,type="later"){
	var fromtime = Date.parse('1988/01/06 '+from);
	var totime = Date.parse('1988/01/06 '+to);

	if (fromtime < totime) return true;
	else return false;
}

/*///////////////////
convert timestring to Javascript timestamp. 
Input time value
Return javascript timestamp value
///////////////////*/
function getJsTimestamp(time){
	var time = time.substring(0, time.length - 2) + " " + time.substring(time.length, time.length - 2);
	return time;
}

/*///////////////////
upload temporary file
return none
///////////////////*/
function image_upload_init(){
	$('#image_upload').change(function(){

		var fileInput = $(this);
		var url = '/api'+fileInput.attr('api');
		var form = fileInput.attr('fdata');
		var container = fileInput.attr('container');
		var formInput = fileInput.attr('form-input');

		var data = new FormData($('#'+form)[0]);

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

function getUserInfo(){

	sendAPI('GET', '/userinfo').then(function(response){
		var data = response.data[0];

		// set logo 
		if(data.logo != null) {
			$('.school-logo').css('background', 'url("/'+data.logo+'"');
			// $('.brand-logo').addClass('withschoollogo');
			$('#system_user').html(data.school_name + ' , ' + data.access_name);
		}else{
			$('#system_user').html(data.access_name);
		}

	})
	.catch(function(error){

	});
}

function errorMsg(msg = language.somethingwentwrong){
	showToast('<i class="material-icons">error</i> '+msg);
	return '<div class="error"><i class="material-icons">error</i> '+language.somethingwentwrongrefresh+'</div>';
}

function getPageTitle(route){
	
	setPageUrl(route);

	for (var i = 0; i < routes.length; i++){
	  if (routes[i].path == route){
	    // console.log(routes[i].name);
	    
	    return routes[i].title;
	  }
	}
}

function setPageUrl(url){

	if(url.indexOf('/s/') >= 0) url = url.slice(2);
	
	
	window.history.pushState('', '', url);
}

function getNavCrumbs(link = true){
	var activePages = app.page_stack;
	
		// make nav crumbs
		setNavCrumbs(activePages, link);
}

function pushPageStack(url){
	if(app.page_stack.indexOf(url) < 0) app.page_stack.push(url);
	else app.page_stack.splice(app.page_stack.indexOf(url), app.page_stack.length, url);
}

function setNavCrumbs(pages,link){

	var crumbs = '';

	$.each(pages, function(key,val){

		val = val.slice(2);
		if(getPageTitle(val)) {

			var active;

			if(key+1 == pages.length) active = 'active';
			else active = '';

			// return crumbs with or without link depending on preference
			if(link) crumbs += '<a onclick="loadContent(\''+val+'\')" class="breadcrumb '+active+'">'+getPageTitle(val)+'</a>';
			else crumbs += '<a class="breadcrumb '+active+'">'+getPageTitle(val)+'</a>';

		}
	});

	// page_crumbs
	appendNavCrumbs(crumbs);
}

function appendNavCrumbs(crumbs){

	$('#page_crumbs').html(crumbs);

	// disabled  ; enable if to remove the crumbs in index page
	return;
	if(app.page_stack.length > 1) $('#page_crumbs').html(crumbs);
	else $('#page_crumbs').html('');
}

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

function clock(id){

	date = new Date;
    year = date.getFullYear();
    month = date.getMonth();
    months = new Array('January', 'February', 'March', 'April', 'May', 'June', 'Jully', 'August', 'September', 'October', 'November', 'December');
    d = date.getDate();
    day = date.getDay();
    days = new Array('Sunday', 'Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday', 'Saturday');

    h = date.toLocaleTimeString();

    // h = date.getHours();
    // if(h<10)
    // {
    //         h = "0"+h;
    // }
    // m = date.getMinutes();
    // if(m<10)
    // {
    //         m = "0"+m;
    // }
    // s = date.getSeconds();
    // if(s<10)
    // {
    //         s = "0"+s;
    // }
    // result = ''+days[day]+' '+months[month]+' '+d+' '+year+' '+h+':'+m+':'+s;

    result = ''+days[day]+', '+months[month]+' '+d+' '+year+', '+h;


    if(document.getElementById(id) != null) {
    	document.getElementById(id).innerHTML = result;
	    setTimeout('clock("'+id+'");','1000');
	}
}

function populate_select(element, url, type){

	sendAPI('GET', url).then(function(response){
		// remove section content
		$('#'+element+' option').remove();

		console.log(response.data.length);

		if(response.data.length > 0){
			// populate
			$.each(response.data, function(key,val){
				if(val.name) $('#'+element).append('<option value="'+val.id+'">'+val.name+'</option>');
				else $('#'+element).append('<option value="'+val.id+'">'+val.firstname+' '+val.lastname+'</option>');
			});
		}else{
			$('#'+element).append('<option value="" disabled>no '+type+' available</option>');
		}

		$('select').material_select();
	});
}

function resetPassword(id){

	var result = confirm('Do you really want to reset the password?');

	if(result){
		sendAPI('GET', '/user/resetpassword/'+id).then(function(response){
			// show success message
			showToast(response.message);

			setTimeout(function(){
				window.location.reload();
			}, 1500);

		}).catch(function(error){
			errorMsg();
		});
	}
	
}

function navClick(e){
	var url = $(e).attr('url');
	loadContent('/s'+url);
}

function checkFormError(form){

	var error = [];

	$('#'+form+' input, '+form+' select').each(
	    function(index){  
	        // var input = $(this);
	        // alert('Type: ' + input.attr('type') + 'Name: ' + input.attr('name') + 'Value: ' + input.val());
	        console.log($(this));
	        if( $( this ).hasClass('invalid') ) error.push($(this));
	    }
	);


	if(error.length == 0){
		return false;
	}else{
		return true;
	}
}

function sendForm(form, url, successpage){
	var data = $('#'+form).serializeArray();

	console.log(data);

	if(!checkFormError(form)){

		sendAPI('POST', url, data).then(function(response){

			if($('.error-data').html() != ''){
				$('.error-data').html('');
				$('.error-message').html('');
			}

			showToast(response.message);

			if(successpage){
				setTimeout(function(){
					// window.location.href="/users";
					window.location.href= '/'+successpage;
				}, 1000);
			}
		})
		.catch(function(error){
			
			var err = JSON.parse(error.responseText);

			$('.error-message').html(err.message);
			$('.error-data').html('');
			$.each(err.errors, function(key, val){
				$('.error-data').append('<li>'+val+'</li>');
			});

			$('html, body').animate({ scrollTop: 0 }, 'slow');
		});
	}else{
		showToast(language.errorinform);
	}
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

function uploadTempImg(url, data){
	return(
			$.ajax({
				headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
		        url: url,
		        data: data,
		        datatype:'json',
		        processData: false, 
		        contentType: false,
		        type: 'POST',
		        success: function (dat) {
		            // do something with the result
		            // console.log(dat);
		        }
		    })
		);
}

function printBtn(){
	alert('print document');
	return;
	// if(window.print()) console.log('printing');
	window.print();
	console.log(printing);
	//Copy the element you want to print to the print-me div.
    $("#app-main").clone().appendTo("#print_div");
    //Apply some styles to hide everything else while printing.
    $("body").addClass("printing");
    //Print the window.
    window.print();
    //Restore the styles.
    $("body").removeClass("printing");
    //Clear up the div.
    $("#print_div").empty();
}

function addBtn(){
	$('#data-add').click();
}

function editBtn(){
	alert('open edit view');
}

function tutorial(){
	if(!isPasswordChanged() && !isPasswordChangeShow()){
		$('.change-password').tapTarget('open');
		localStorage.setItem('passwordChangeShow', true);
	}
}

function isPasswordChangeShow(){
	return localStorage.getItem('passwordChangeShow');
}

function isPasswordChanged(){
	var changepasswordstate = $('meta[name="default-password"]').attr('content');
	if(changepasswordstate == 1) return true;
	else return false;
}

