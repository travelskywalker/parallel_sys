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

function navClick(e){
	var url = $(e).attr('url');
	loadContent('/s'+url);
}

function sendForm(form, url, successpage){
	var data = $('#'+form).serializeArray();

	sendAPI('POST', url, data).then(function(response){
		if($('.error-data').html() != ''){
			$('.error-data').html('');
			$('.error-message').html('');
		}

		showToast(response.message);

		console.log(response);

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
