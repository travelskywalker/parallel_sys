function loader(){
	var loader = '<div style="width: 100%" class="center-align">';
		loader += '<div class="preloader-wrapper small active">';
		loader += '<div class="spinner-layer spinner-green-only">';
		loader += '<div class="circle-clipper left">';
		loader += '<div class="circle"></div>';
		loader += '</div><div class="gap-patch">';
		loader += '<div class="circle"></div>';
		loader += '</div><div class="circle-clipper right">';
		loader += '<div class="circle"></div>';
		loader += '</div>';
		loader += '</div>';
		loader += '</div>';
		loader += '</div>';
	return loader;
}

function compareTime(from,to,type="later"){
	var fromtime = Date.parse('1988/01/06 '+from);
	var totime = Date.parse('1988/01/06 '+to);

	if (fromtime < totime) return true;
	else return false;
}

function getJsTimestamp(time){
	var time = time.substring(0, time.length - 2) + " " + time.substring(time.length, time.length - 2);
	return time;
}

function image_upload_init(){
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

			console.log(response);

			// append to container
			$('#'+container).css({'background':'url("/'+response+'")'});
			// add url to logo input
			$('#'+formInput).val(response);

		}).catch(function(error){
			console.log('img upload', error);
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

function errorMsg(){
	showToast('<i class="material-icons">error</i> '+language.somethingwentwrong);
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
    return true;
}

function populate_select(element, url){

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
			$('#'+element).append('<option value="" disabled>no class available</option>');
		}

		$('select').material_select();
	});
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

			setTimeout(function(){
				// window.location.href="/users";
				window.location.href= '/'+successpage;
			}, 1000);
			
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
